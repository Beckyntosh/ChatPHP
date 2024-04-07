<?php
session_start();

$googleClientID = 'YOUR_GOOGLE_CLIENT_ID';
$googleClientSecret = 'YOUR_GOOGLE_CLIENT_SECRET';
$redirectURL = 'http://your-website.com/';

require_once 'vendor/autoload.php';

// Database connection
$mysqli = new mysqli('db', 'root', 'root', 'my_database');
if ($mysqli->connect_error) {
    die('Connection Failed: ' . $mysqli->connect_error);
}

// Create users table if not exists
$createTable = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    google_id VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    profile_pic VARCHAR(255)
)";
$mysqli->query($createTable);

// Google Client Configuration
$client = new Google_Client();
$client->setClientId($googleClientID);
$client->setClientSecret($googleClientSecret);
$client->setRedirectUri($redirectURL);
$client->addScope('email');
$client->addScope('profile');

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    // Getting user profile
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email = $google_account_info->email;
    $name = $google_account_info->name;
    $google_id = $google_account_info->id;
    $profile_pic = $google_account_info->picture;

    // Check user in database
    $result = $mysqli->query("SELECT * FROM users WHERE google_id = '$google_id'");
    if ($result->num_rows == 0) {
        // User not found, insert user
        $insert = $mysqli->query("INSERT INTO users (google_id, name, email, profile_pic) VALUES ('$google_id', '$name', '$email', '$profile_pic')");
        echo "<script>window.close();</script>";
    } else {
        // User found, proceed to website
        echo "<script>window.close();</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup with Google</title>
</head>
<body>
    <h2>Signup for Our Clothing Website</h2>
    <a href="<?= $client->createAuthUrl() ?>">Signup with Google</a>
</body>
</html>

<?php
$mysqli->close();
?>
