<?php
// Social Media Account Linking for Quick Login - Facebook Example
session_start();

$host = 'db';
$db   = 'my_database';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Creating table if it doesn't exist
$pdo->exec("CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    facebook_id VARCHAR(255) UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;");

require_once "vendor/autoload.php";

$fb = new \Facebook\Facebook([
  'app_id' => '{app-id}', // Replace {app-id} with your app id
  'app_secret' => '{app-secret}',
  'default_graph_version' => 'v2.10',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email'];
$loginUrl = $helper->getLoginUrl('http://yourwebsite.com/fb-callback.php', $permissions);

// Login button
echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';

if(isset($_SESSION['fb_access_token'])) {
    // User already logged in
    try {
        $response = $fb->get('/me?fields=id,name,email', $_SESSION['fb_access_token']);
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

    $user = $response->getGraphUser();
    // Check if the user is already in the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE facebook_id=:facebook_id");
    $stmt->execute(['facebook_id' => $user['id']]);
    $result = $stmt->fetch();

    if (!$result) {
        // New user
        $stmt = $pdo->prepare("INSERT INTO users (name, email, facebook_id) VALUES (:name, :email, :facebook_id)");
        $stmt->execute([
            'name' => $user['name'],
            'email' => $user['email'],
            'facebook_id' => $user['id'],
        ]);
        echo "New user registered.";
    } else {
        // Existing user
        echo "Welcome back, " . $result['name'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login with Facebook</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            text-align: center;
            background-color: #f2e6ff;
        }
        a {
            display: inline-block;
            background-color: #4267b2;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
</body>
</html>
