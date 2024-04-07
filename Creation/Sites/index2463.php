<?php
// Database connection
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
);

$pdo = new PDO(
    'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DATABASE, // DSN
    MYSQL_USER, // Username
    MYSQL_PASSWORD, // Password
    $pdoOptions // Options
);

// Create user table if not exists
$pdo->exec("CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;");

// Google API setup
require_once 'vendor/autoload.php';

$googleClient = new Google_Client();
$googleClient->setClientId('YOUR_CLIENT_ID');
$googleClient->setClientSecret('YOUR_CLIENT_SECRET');
$googleClient->setRedirectUri('http://your-redirect-uri.com');
$googleClient->addScope('email');
$googleClient->addScope('profile');

session_start();

// Handle Google OAuth callback
if (isset($_GET['code'])) {
    $token = $googleClient->fetchAccessTokenWithAuthCode($_GET['code']);
    $googleClient->setAccessToken($token);

    $google_oauth = new Google_Service_Oauth2($googleClient);
    $google_account_info = $google_oauth->userinfo->get();
    $email = $google_account_info->email;
    $name = $google_account_info->name;

    // Insert or update user in the database
    $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email) ON DUPLICATE KEY UPDATE name = :name, email = :email");
    $stmt->execute(['name' => $name, 'email' => $email]);

    // Set user session or cookie for logged in state
    $_SESSION['logged_in'] = true;
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;

    header('Location: welcome.php');
    exit();
}

// HTML and Script
?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup with Google</title>
</head>
<body>
    <h1>Makeup World - Sign Up</h1>
    <p>Join us and let's make beauty fun!</p>
    <?php
    if (!isset($_SESSION['logged_in'])) {
        echo '<a href="' . $googleClient->createAuthUrl() . '">Sign Up with Google</a>';
    } else {
        echo "<p>Welcome, {$_SESSION['name']}! You're signed up with {$_SESSION['email']}.</p>";
    }
    ?>
</body>
</html>
