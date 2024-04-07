<?php
session_start();

// Google API configuration
define('GOOGLE_CLIENT_ID', 'INSERT_YOUR_GOOGLE_CLIENT_ID_HERE');
define('GOOGLE_CLIENT_SECRET', 'INSERT_YOUR_GOOGLE_CLIENT_SECRET_HERE');
define('GOOGLE_REDIRECT_URI', 'http://yourwebsite.com/signup.php');

// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    google_id VARCHAR(30) NOT NULL,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    profile_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql)) {
    die("Error creating table: " . $conn->error);
}

require_once 'vendor/autoload.php';

// Google Client configuration
$client = new Google_Client();
$client->setClientId(GOOGLE_CLIENT_ID);
$client->setClientSecret(GOOGLE_CLIENT_SECRET);
$client->setRedirectUri(GOOGLE_REDIRECT_URI);
$client->addScope("email");
$client->addScope("profile");

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    // Get user profile
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email =  $google_account_info->email;
    $first_name = $google_account_info->givenName;
    $last_name = $google_account_info->familyName;
    $google_id = $google_account_info->id;
    $profile_url = $google_account_info->picture;

    // Insert or update user data to the database
    $sql = $conn->prepare("SELECT * FROM users WHERE google_id=?");
    $sql->bind_param("s", $google_id);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows == 0) {
        // New user
        $stmt = $conn->prepare("INSERT INTO users (google_id, first_name, last_name, email, profile_url) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $google_id, $first_name, $last_name, $email, $profile_url);
        $stmt->execute();
    }

    // Set session variables
    $_SESSION['logged_in'] = true;
    $_SESSION['google_id'] = $google_id;
    $_SESSION['email'] = $email;
    
    header('Location: welcome.php'); // Redirect to welcome page after login
    exit();
}

// Google login URL
$google_login_url = $client->createAuthUrl();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Makeup Website Signup</title>
    <style>
        body {
            font-family: 'Trebuchet MS', sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }
        .container {
            width: 300px;
            margin: 100px auto;
        }
        .login-button {
            padding: 15px 25px;
            background-color: #dd4b39;
            color: #ffffff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Login with Google</h2>
    <button onclick="window.location = '<?php echo $google_login_url; ?>'" class="login-button">Login with Google</button>
</div>

</body>
</html>
