<?php

// Replace the following placeholders with your actual data where necessary.
// This includes MYSQL_ROOT_PSWD, MYSQL_DB, and servername.

session_start();

// Google Client Library
require_once 'vendor/autoload.php';

// Database configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
google_id VARCHAR(30) NOT NULL,
name VARCHAR(50),
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

$clientID = 'YOUR_GOOGLE_CLIENT_ID';
$clientSecret = 'YOUR_GOOGLE_CLIENT_SECRET';
$redirectUri = 'YOUR_REDIRECT_URI';

// Creating Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // Getting user profile
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email =  $google_account_info->email;
    $name =  $google_account_info->name;
    $google_id = $google_account_info->id;

    // Check if user already exists
    $checkUser = "SELECT * FROM users WHERE google_id='$google_id'";
    $res = $conn->query($checkUser);
    if ($res->num_rows == 0) {
        // Insert user in the database
        $insert = "INSERT INTO users (google_id, name, email) VALUES ('$google_id', '$name', '$email')";
        if ($conn->query($insert) === TRUE) {
            $_SESSION['user_email'] = $email; // Set session variables
            echo "New record created successfully";
        } else {
            echo "Error: " . $insert . "<br>" . $conn->error;
        }
    } else {
        $_SESSION['user_email'] = $email; // Set session variables
    }

    header('Location: index.php');
    exit();
}

// If button clicked
if (isset($_GET['login'])) {
    $login_url = $client->createAuthUrl();
    header("Location: " . $login_url);
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Login with Google Account</title>
</head>
<body>

Login button
<?php
if (!isset($_SESSION['user_email'])) {
    echo '<a href="?login" class="button">Login With Google</a>';
} else {
    echo "You are logged in as: " . $_SESSION['user_email'];
}
?>

</body>
</html>
