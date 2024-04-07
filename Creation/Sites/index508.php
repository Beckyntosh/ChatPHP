<?php
// Note: This sample code is simplified and not production-ready. Ensure to add error handling, security measures such as input validation, and comply with the latest OAuth standards and best practices.

session_start();

// Database configuration
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DATABASE', 'my_database');
define('MYSQL_SERVER', 'db');

// Google OAuth 2.0 configuration
define('GOOGLE_CLIENT_ID', 'your_google_client_id_here');
define('GOOGLE_CLIENT_SECRET', 'your_google_client_secret_here');
define('GOOGLE_REDIRECT_URI', 'http://your_website.com/oauth_callback.php');

// Connect to the database
$dsn = 'mysql:host='.MYSQL_SERVER.';dbname='.MYSQL_DATABASE;
try {
    $pdo = new PDO($dsn, MYSQL_USER, MYSQL_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

// Frontend HTML
echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login with Google</title>
</head>
<body>
    <h2>Login to Our Travel Site</h2>
    <a href="{$googleLoginUrl}">Login with Google</a>
</body>
</html>
HTML;

// Function to get a Google login URL
function getGoogleLoginUrl() {
    $authUrl = 'https://accounts.google.com/o/oauth2/v2/auth?response_type=code&';
    $authUrl .= 'client_id='.urlencode(GOOGLE_CLIENT_ID).'&';
    $authUrl .= 'redirect_uri='.urlencode(GOOGLE_REDIRECT_URI).'&';
    $authUrl .= 'scope='.urlencode('email profile').'&';
    $authUrl .= 'access_type=online';

    return $authUrl;
}

if (isset($_GET['code'])) {
    // Google redirects here after user login
    $code = $_GET['code'];

    // Exchange the auth code for an access token
    $tokenResponse = file_get_contents('https://oauth2.googleapis.com/token', false, stream_context_create([
        'http' => [
            'method' => 'POST',
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            'content' => http_build_query([
                'code' => $code,
                'client_id' => GOOGLE_CLIENT_ID,
                'client_secret' => GOOGLE_CLIENT_SECRET,
                'redirect_uri' => GOOGLE_REDIRECT_URI,
                'grant_type' => 'authorization_code'
            ])
        ]
    ]));

    $token = json_decode($tokenResponse, true);

    if (isset($token['access_token'])) {
        // Fetch user profile
        $userProfile = file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo?access_token=' . $token['access_token']);
        $profile = json_decode($userProfile, true);

        // Check if user exists in your database, otherwise, create a new user entry
        // For simplicity, user's email is considered as a unique identifier

        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$profile['email']]);
        $user = $stmt->fetch();

        if (!$user) {
            // New user
            $stmt = $pdo->prepare("INSERT INTO users (email, name) VALUES (?, ?)");
            $stmt->execute([$profile['email'], $profile['name']]);
            $userId = $pdo->lastInsertId();
        } else {
            $userId = $user['id'];
        }

        // Log the user in
        $_SESSION['user_id'] = $userId;
        header('Location: /');
        exit();
    }
} else {
    $googleLoginUrl = getGoogleLoginUrl();
    // Place the login link on frontend as shown above
}
?>