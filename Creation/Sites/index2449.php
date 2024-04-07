<?php
// social_integration_signup.php

session_start();

// Configuration and Database Connection
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create users table if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    google_id VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Google Client Configuration
require_once 'vendor/autoload.php';

$google_client = new Google_Client();
$google_client->setClientId('Google_Client_ID');
$google_client->setClientSecret('Google_Client_Secret');
$google_client->setRedirectUri('http://your-website.com/social_integration_signup.php');
$google_client->addScope('email');
$google_client->addScope('profile');

// Sign in with Google
if (isset($_GET["code"])) {
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
    if (!isset($token["error"])) {
        $google_client->setAccessToken($token['access_token']);
        $google_service = new Google_Service_Oauth2($google_client);
        $data = $google_service->userinfo->get();
        
        // Check if user exists
        $checkUserQuery = "SELECT * FROM users WHERE google_id='".$data['id']."'";
        $checkUserResult = $conn->query($checkUserQuery);
        
        // If user not exists, insert
        if ($checkUserResult->num_rows == 0) {
            $insertQuery = "INSERT INTO users (google_id, name, email) VALUES ('".$data['id']."', '".$data['name']."', '".$data['email']."')";
            $insertResult = $conn->query($insertQuery);
            if (!$insertResult) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['user_name'] = $data['name'];
        header('Location: welcome.php');
        exit();
    }
}

// Frontend
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up with Google</title>
</head>
<body>
    <div style="text-align: center;">
        <h2>Office Supplies - Sign Up</h2>
        <?php
            // Google Signup Button
            echo '<a href="'.$google_client->createAuthUrl().'">Sign Up with Google</a>';
        ?>
    </div>
</body>
</html>
