<?php

session_start();

$clientId = 'YOUR_GOOGLE_CLIENT_ID';
$clientSecret = 'YOUR_GOOGLE_CLIENT_SECRET';
$redirectUrl = 'YOUR_REDIRECT_URI';

$mysqli = new mysqli('db', 'root', 'root', 'my_database');

if ($mysqli->connect_error) {
    die('Database connection error: ' . $mysqli->connect_error);
}

if (isset($_GET['code'])) {
    $token = getToken($_GET['code'], $clientId, $clientSecret, $redirectUrl);
    
    if (isset($token->id_token)) {
        $userData = getUserData($token->id_token);
        if ($userData) {
            $userId = userExists($mysqli, $userData->email);
            if (!$userId) {
                $userId = createUser($mysqli, $userData);
            }
            $_SESSION['user_id'] = $userId;
            header('Location: dashboard.php');
            exit;
        }
    }
}

function getToken($code, $clientId, $clientSecret, $redirectUri) {
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
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        ]
    ];
    
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return json_decode($result);
}

function getUserData($idToken) {
    $userData = null;
    $url = 'https://www.googleapis.com/oauth2/v3/tokeninfo?id_token=' . $idToken;
    
    $response = file_get_contents($url);
    $jwtPayload = json_decode($response, true);
    
    if (isset($jwtPayload['email'])) {
        $userData = new stdClass();
        $userData->email = $jwtPayload['email'];
        $userData->name = $jwtPayload['name'];
    }
    
    return $userData;
}

function userExists($mysqli, $email) {
    $stmt = $mysqli->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['id'];
    }
    
    return false;
}

function createUser($mysqli, $userData) {
    $stmt = $mysqli->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $userData->name, $userData->email);
    $stmt->execute();
    return $stmt->insert_id;
}

?>
<!doctype html>
<html>
<head>
    <title>Romeo and Juliet Prescription Signup</title>
</head>
<body>
    <h1>Welcome to our Prescription Medications Website</h1>
    <p style="font-style: italic;">A modern tale of health and care, woven with the threads of ancient love.</p>
    <a href="https://accounts.google.com/o/oauth2/v2/auth?response_type=code&client_id=<?= $clientId ?>&redirect_uri=<?= $redirectUrl ?>&scope=email%20profile&prompt=select_account">Sign Up with Google</a>
</body>
</html>