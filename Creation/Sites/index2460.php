<?php
// Initialize a session.
session_start();

// Include Google API client library.
require_once 'path/to/google-api-php-client/vendor/autoload.php';

// Replace 'path/to/google-api-php-client/vendor/autoload.php' with the path to your Google API vendor autoload.php.

// Database configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create users table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    google_id VARCHAR(30) NOT NULL,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Google API Configuration
$clientID = 'YOUR_GOOGLE_CLIENT_ID';
$clientSecret = 'YOUR_GOOGLE_CLIENT_SECRET';
$redirectUri = 'http://localhost/google-signin.php';

// Create client object
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// Handle Google login
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // Get user profile
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    
    // User info
    $google_id = mysqli_real_escape_string($conn, $google_account_info->id);
    $email = mysqli_real_escape_string($conn, $google_account_info->email);
    $first_name = mysqli_real_escape_string($conn, $google_account_info->givenName);
    $last_name = mysqli_real_escape_string($conn, $google_account_info->familyName);

    // Check if user already exists
    $checkUser = $conn->query("SELECT * FROM users WHERE google_id='$google_id'");
    if ($checkUser->num_rows > 0) {
        // User already exists
        $_SESSION['loggedIn'] = true;
        $_SESSION['email'] = $email;
    } else {
        // New user
        $insert = $conn->query("INSERT INTO users (google_id, first_name, last_name, email) VALUES ('$google_id', '$first_name', '$last_name', '$email')");
        if ($insert) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['email'] = $email;
        }
    }
    header('Location: index.php');
    exit;
}

// Google login URL
$google_login_url = $client->createAuthUrl();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Baby Products Website</title>
</head>
<body>
    <h2>Welcome to Our Baby Products Website</h2>
    <?php if(isset($_SESSION['loggedIn'])): ?>
        <p>You are logged in as <?= $_SESSION['email'] ?>. <a href="logout.php">Logout</a></p>
    <?php else: ?>
        <a href="<?= htmlspecialchars($google_login_url) ?>">Sign in with Google</a>
    <?php endif; ?>
</body>
</html>

<?php $conn->close(); ?>
