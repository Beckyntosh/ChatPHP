<?php
// Simplified example for educational and research purposes only. 
// In a real-world situation, you will need to handle errors and security concerns more thoroughly.

// Google PHP SDK: Including it via Composer is recommended, but for simplicity, assuming it's already set up.
require_once 'vendor/autoload.php';

// Session start
session_start();

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

// OAuth Configuration
$clientID = 'YOUR_GOOGLE_CLIENT_ID';
$clientSecret = 'YOUR_GOOGLE_CLIENT_SECRET';
$redirectUri = 'http://yourwebsite.com/callback.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// If we have a code back from the OAuth 2.0 flow, we need to exchange that with the authenticate() function.
// We store the resultant access token bundle in the session, and redirect to ourself.
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // Get user profile data from google
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email =  $google_account_info->email;
    $name =  $google_account_info->name;

    // Check if user already exists in our database
    $checkUserQuery = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($checkUserQuery);

    if ($result->num_rows == 0) {
        // User does not exist, insert.
        $insertQuery = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
        if (!$conn->query($insertQuery)) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $_SESSION['name'] = $name;
    // Redirect to index page or wherever you like
    header('Location: index.php');
    exit();
}

// If there's no code, it's the request for login
<!DOCTYPE html>
<html>
<head>
    <title>Login with Google</title>
    <link rel='stylesheet' type='text/css' href='style.css'/>
</head>
<body>
    <div style='margin-top: 100px;' class='login'>
        <h2>Makeup Site: Sign in with Google</h2>
        <form>
            <input type='button' value='Login with Google' onclick='window.location = \"".$client->createAuthUrl()."\";' />
        </form>
    </div>
</body>
</html>
