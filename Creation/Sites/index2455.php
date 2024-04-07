<?php

session_start();

require_once 'vendor/autoload.php';

$mysqlRootPswd = 'root';
$mysqlDB = 'my_database';
$servername = 'db';

$conn = new mysqli($servername, 'root', $mysqlRootPswd, $mysqlDB);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    google_id VARCHAR(30) NOT NULL,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

$googleClient = new Google\Client();
$googleClient->setClientId('Your_Google_ClientID_here');
$googleClient->setClientSecret('Your_Google_ClientSecret_here');
$googleClient->setRedirectUri('http://yourredirecturi.com');
$googleClient->addScope('email');
$googleClient->addScope('profile');


echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="signup-container">
        <h1>Shoes Website Signup</h1>
        <a href="' . $googleClient->createAuthUrl() . '" class="google-btn">Sign up with Google</a>
    </div>
</body>
</html>';

if (isset($_GET['code'])) {
    $token = $googleClient->fetchAccessTokenWithAuthCode($_GET['code']);
    if (!isset($token['error'])) {
        $googleClient->setAccessToken($token['access_token']);
        $google_service = new Google\Service\Oauth2($googleClient);
        $data = $google_service->userinfo->get();

        $checkUser = $conn->query("SELECT * FROM users WHERE google_id='" . $data['id'] . "'");
        if ($checkUser->num_rows == 0) {
            $insert = $conn->query("INSERT INTO users (google_id, firstname, lastname, email) VALUES ('" . $data['id'] . "', '" . $data['givenName'] . "', '" . $data['familyName'] . "', '" . $data['email'] . "')");
        }

        if ($insert) {
            $_SESSION['id'] = $data['id'];
            header('Location: dashboard.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
