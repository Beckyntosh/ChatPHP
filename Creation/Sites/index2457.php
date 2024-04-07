<?php
session_start();

// Replace these values with your database configuration
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

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    google_id VARCHAR(30) NOT NULL,
    name VARCHAR(50),
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table users created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

require_once 'vendor/autoload.php';

$google_client = new Google_Client();
$google_client->setClientId('your_google_client_id.apps.googleusercontent.com'); //Replace with your Google Client ID
$google_client->setClientSecret('your_google_client_secret'); //Replace with your Google Client Secret
$google_client->setRedirectUri('http://your_website_url.com/signup.php'); //Replace with your Redirect URL
$google_client->addScope('email');
$google_client->addScope('profile');

if (isset($_GET["code"])) {
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    if (!isset($token["error"])) {
        $google_client->setAccessToken($token['access_token']);
        $_SESSION['access_token'] = $token['access_token'];

        $google_service = new Google_Service_Oauth2($google_client);
        $data = $google_service->userinfo->get();

        if (!empty($data['id'])) {
            $google_id = $data['id'];
            $name = $data['name'];
            $email = $data['email'];

            $stmt = $conn->prepare("SELECT id FROM users WHERE google_id = ?");
            $stmt->bind_param("s", $google_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 0) {
                $stmt = $conn->prepare("INSERT INTO users (google_id, name, email) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $google_id, $name, $email);
                $stmt->execute();
            }

            $_SESSION['google_id'] = $google_id;
            header('Location: welcome.php');
            exit();
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up With Google</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="signup-container">
        <h2>Welcome to Our Wine Lovers Club!</h2>
        <div class="social-signup">
            <a href="<?= $google_client->createAuthUrl() ?>" class="google-btn">Sign Up with Google</a>
        </div>
    </div>
</body>
</html>
