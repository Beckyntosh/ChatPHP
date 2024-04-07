<?php
// Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

// Start session to save user data
session_start();

// Set Google Client
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

// Database configuration
$dbHost = 'db';
$dbUser = 'root';
$dbPassword = 'root';
$dbName = 'my_database';

try {
    $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create users table if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        google_id VARCHAR(255) NOT NULL,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP
    )";

    $conn->exec($sql);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // Get user profile data from google
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email =  $google_account_info->email;
    $name = explode(' ', $google_account_info->name);
    $firstname = $name[0];
    $lastname = (count($name) > 1 ? $name[1] : '');

    // Check if user exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE google_id=:google_id");
    $stmt->execute(['google_id' => $google_account_info->id]);
    if ($stmt->rowCount() == 0) {
        // New user, insert into database
        $sql = "INSERT INTO users (google_id, firstname, lastname, email) VALUES (?,?,?,?)";
        $conn->prepare($sql)->execute([$google_account_info->id, $firstname, $lastname, $email]);
    }

    // Set session variables and redirect
    $_SESSION['email'] = $email;
    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    header('Location: index.php');
    exit();
}

if (!isset($_SESSION['email'])) {
    echo '<a href="' . $client->createAuthUrl() . '">Login With Google</a>';
} else {
    echo 'Welcome ' . $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];
}
