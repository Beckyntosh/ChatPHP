<?php
session_start();

// Google Client Configuration
require_once 'vendor/autoload.php';
$googleClient = new Google_Client();
$googleClient->setClientId('your-google-client-id');
$googleClient->setClientSecret('your-google-client-secret');
$googleClient->setRedirectUri('your-redirect-uri');
$googleClient->addScope('email');
$googleClient->addScope('profile');

// Database Configuration
$dbHost = 'db';
$dbUser = 'root';
$dbPass = 'root';
$dbName = 'my_database';
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the table exists, if not create it
$tableCheckQuery = "SHOW TABLES LIKE 'users';";
$result = $conn->query($tableCheckQuery);

if ($result->num_rows == 0) {
    $createTableQuery = "CREATE TABLE users (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        google_id VARCHAR(30) NOT NULL,
        name VARCHAR(50),
        email VARCHAR(50),
        profile_pic VARCHAR(100)
    )";
    if (!$conn->query($createTableQuery)) {
        die("Error creating table: " . $conn->error);
    }
}

// Google OAuth Callback
if (isset($_GET['code'])) {
    $token = $googleClient->fetchAccessTokenWithAuthCode($_GET['code']);
    if (!isset($token['error'])) {
        $googleClient->setAccessToken($token['access_token']);
        $googleService = new Google_Service_Oauth2($googleClient);
        $data = $googleService->userinfo->get();

        $checkUserQuery = "SELECT * FROM users WHERE google_id = '".$data['id']."'";
        $result = $conn->query($checkUserQuery);
        if ($result->num_rows == 0) {
            // Insert user in the database
            $insertQuery = "INSERT INTO users (google_id, name, email, profile_pic) VALUES ('".$data['id']."', '".$data['name']."', '".$data['email']."', '".$data['picture']."')";
            if (!$conn->query($insertQuery)) {
                die("Error creating user: " . $conn->error);
            }
        }   

        $_SESSION['user'] = $data;
        header('Location: ./');
        exit();
    }
}

// Logout
if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    session_destroy();
    header('Location: ./');
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup with Google</title>
</head>
<body>
<?php if(!isset($_SESSION['user'])): ?>
    <a href="<?php echo $googleClient->createAuthUrl(); ?>">Signup with Google</a>
<?php else: ?>
    <p>Welcome, <?php echo $_SESSION['user']['name']; ?>!</p>
    <img src="<?php echo $_SESSION['user']['picture']; ?>" alt="Profile Picture">
    <p><a href="?logout">Logout</a></p>
<?php endif; ?>
</body>
</html>