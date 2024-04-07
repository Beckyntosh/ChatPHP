<?php
session_start();

$clientId = 'YOUR_GOOGLE_CLIENT_ID'; // Replace with your Google Client ID
$clientSecret = 'YOUR_GOOGLE_CLIENT_SECRET'; // Replace with your Google Client Secret
$redirectUri = 'http://yourwebsite.com/callback.php'; // Replace yourwebsite.com with your domain name
$mysqlRootPassword = 'root'; // MySQL root password
$mysqlDatabaseName = 'my_database'; // MySQL Database name
$servername = 'db'; // Server name

function getGoogleLoginUrl() {
    global $clientId, $redirectUri;
    $scopes = urlencode('https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile');
    $googleLoginUrl = "https://accounts.google.com/o/oauth2/v2/auth?response_type=code&client_id={$clientId}&redirect_uri={$redirectUri}&scope={$scopes}&access_type=online&prompt=consent";
    return $googleLoginUrl;
}

function getUserInfo($accessToken) {
    $url = "https://www.googleapis.com/oauth2/v1/userinfo?access_token={$accessToken}";
    $userInfoJson = file_get_contents($url);
    $userInfo = json_decode($userInfoJson, true);
    return $userInfo;
}

function connectDatabase($servername, $mysqlRootPassword, $mysqlDatabaseName) {
    try {
    $conn = new PDO("mysql:host={$servername};dbname={$mysqlDatabaseName}", 'root', $mysqlRootPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
  }
    return $conn;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['code'])) {
    $code = $_GET['code'];
    $url = 'https://www.googleapis.com/oauth2/v4/token';
    $data = [
        'code' => $code,
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'redirect_uri' => $redirectUri,
        'grant_type' => 'authorization_code',
    ];
    $options = [
        'http' => [
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data),
        ],
    ];
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result, true);

    if (isset($response['access_token'])) {
        $accessToken = $response['access_token'];
        $userInfo = getUserInfo($accessToken);
        $conn = connectDatabase($servername, $mysqlRootPassword, $mysqlDatabaseName);

        try {
            $stmt = $conn->prepare("INSERT INTO users (email, google_id, name) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE name=?");
            $stmt->execute([$userInfo['email'], $userInfo['id'], $userInfo['name'], $userInfo['name']]);
        } catch(PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        $_SESSION['user_email'] = $userInfo['email'];
        header('Location: welcome.php');
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !isset($_SESSION['user_email'])) {
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Login with Google Account</title>
    </head>
    <body>
    <a href="'.getGoogleLoginUrl().'">Sign In with Google</a>
    </body>
    </html>';
}
