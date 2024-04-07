<?php

session_start();

// Database configuration
define("MYSQL_ROOT_PSWD", 'root');
define("MYSQL_DB", 'my_database');
$servername = "db";
$username = "root";
$password = MYSQL_ROOT_PSWD;
$dbname = MYSQL_DB;

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
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

require_once 'vendor/autoload.php';

// Google API Configuration
$clientID = 'YOUR_GOOGLE_CLIENT_ID';
$clientSecret = 'YOUR_GOOGLE_CLIENT_SECRET';
$redirectUri = 'YOUR_REDIRECT_URI';

// Create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// Authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // Get profile info from google
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email =  $google_account_info->email;
    $google_id = $google_account_info->id;

    // Check if user exists in our database
    $checkUser = $conn->query("SELECT * FROM users WHERE google_id='$google_id'");
    if($checkUser->num_rows == 0){
        // Insert user into database
        $insert = $conn->query("INSERT INTO users (google_id, email) VALUES ('$google_id', '$email')");
    }

    $_SESSION['email'] = $email;
    header('Location: index.php');
    exit();
}

// HTML and PHP mix for frontend
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login with Google</title>
    <style>
        body {font-family: Arial, sans-serif; font-size: 18px; font-weight: bold;}
        .login {margin: 50px auto; width: 300px; padding: 20px; border: 1px solid #ccc; background: #eee;}
    </style>
</head>
<body>
    <div class="login">
        <h2>Login with Google</h2>
        <form action="<?php echo $client->createAuthUrl(); ?>">
            <input type="submit" value="Login with Google" />
        </form>
    </div>
</body>
</html>
<?php
$conn->close();
?>
