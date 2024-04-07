<?php
session_start();

// Google API Configuration
require_once 'vendor/autoload.php';
$googleClient = new Google_Client();
$googleClient->setClientId('your-google-client-id');
$googleClient->setClientSecret('your-google-client-secret');
$googleClient->setRedirectUri('your-redirect-uri');
$googleClient->addScope('email');
$googleClient->addScope('profile');

// Database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is already logged in
if (isset($_SESSION['access_token'])) {
    header('Location: index.php');
    exit();
}

// Login URL
$loginURL = $googleClient->createAuthUrl();

if(isset($_GET['code'])) {
    $token = $googleClient->fetchAccessTokenWithAuthCode($_GET['code']);
    if(!isset($token['error'])) {
        $googleClient->setAccessToken($token['access_token']);

        $google_oauth = new Google_Service_Oauth2($googleClient);
        $google_account_info = $google_oauth->userinfo->get();
        $email = $google_account_info->email;
        $name = $google_account_info->name;

        // Insert or update user data to the database
        $query = "INSERT INTO users (name, email) VALUES ('$name', '$email') ON DUPLICATE KEY UPDATE name='$name', email='$email'";
        if(!$conn->query($query)) {
            echo "Database error: " . $conn->error;
        }

        $_SESSION['access_token'] = $token['access_token'];
        $_SESSION['user_email'] = $email;
        header('Location: index.php');
        exit();
    } else {
        header('Location: login.php');
        exit();
    }
}

// Create users table if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!$conn->query($sql)) {
    echo "Error creating table: " . $conn->error;
}

// Close database connection
$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up | Bicycle Website</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="signup-container">
        <h2>Welcome to our Bicycle Website</h2>
        <p>Sign up with your Google account:</p>
        <a href="<?php echo $loginURL; ?>">Sign Up With Google</a>
    </div>
</body>
</html>
