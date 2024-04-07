<?php
session_start();

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

// Create users table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    google_id VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

require_once 'vendor/autoload.php';

// Configure your Google credentials
// Please replace these with your actual credentials
$clientId = 'yourGoogleClientId';
$clientSecret = 'yourGoogleClientSecret';
$redirectUrl = 'yourRedirectURL';

$client = new Google_Client();
$client->setClientId($clientId);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUrl);
$client->addScope("email");
$client->addScope("profile");

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email =  $google_account_info->email;
    $google_id = $google_account_info->id;

    // Check if user exists
    $checkUser = $conn->query("SELECT * FROM users WHERE google_id='$google_id' LIMIT 1");
    if ($checkUser->num_rows == 0) {
        // New user, insert into database
        $insert = $conn->query("INSERT INTO users (google_id, email) VALUES ('$google_id', '$email')");
        if ($insert) {
            $_SESSION['email'] = $email;
            header('Location: success.php'); // Redirect to a success page
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $_SESSION['email'] = $email;
        header('Location: success.php'); // Redirect to a success page
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up with Google</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            text-align: center;
            padding-top: 50px;
        }
        .signup-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: inline-block;
        }
        .google-btn {
            background-color: #db4437;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 2px;
            cursor: pointer;
            font-size: 15px;
        }
        .google-btn:hover {
            background-color: #e04535;
        }
    </style>
</head>
<body>
<div class="signup-container">
    <h2>Sign Up</h2>
    <p>Use your Google account to sign up:</p>
    <a class="google-btn" href="<?= $client->createAuthUrl() ?>">Sign Up with Google</a>
</div>
</body>
</html>
