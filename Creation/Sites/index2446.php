<?php
session_start();

$clientId = 'YOUR_GOOGLE_CLIENT_ID';
$clientSecret = 'YOUR_GOOGLE_CLIENT_SECRET';
$redirectUri = 'YOUR_REGISTERED_REDIRECT_URI';
$dbServername = 'db';
$dbUsername = 'root';
$dbPassword = 'root';
$dbName = 'my_database';

// Connect to database
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['code'])) {
    // Try to get an access token
    $code = $_GET['code'];
    $url = 'https://oauth2.googleapis.com/token';
    $params = array(
        "code" => $code,
        "client_id" => $clientId,
        "client_secret" => $clientSecret,
        "redirect_uri" => $redirectUri,
        "grant_type" => "authorization_code"
    );

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response);

    if (!empty($data->access_token)) {
        // Fetch user information
        $url = 'https://www.googleapis.com/oauth2/v1/userinfo?access_token=' . $data->access_token;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $userInfo = json_decode(curl_exec($ch), true);
        curl_close($ch);

        // Check if user already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email=?");
        $stmt->bind_param("s", $userInfo['email']);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 0) {
            // User does not exist, create new user
            $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
            $stmt->bind_param("ss", $userInfo['name'], $userInfo['email']);
            $stmt->execute();
        }

        $_SESSION['user_email'] = $userInfo['email'];
        header('Location: dashboard.php');
        exit;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup with Google</title>
</head>
<body>
    <h2>Signup for Our Organic Foods Website</h2>
    <p>Use your Google account to signup:</p>
    <a href="https://accounts.google.com/o/oauth2/v2/auth?scope=email&access_type=online&include_granted_scopes=true&response_type=code&state=state_parameter_passthrough_value&redirect_uri=<?php echo urlencode($redirectUri); ?>&client_id=<?php echo $clientId; ?>">Signup with Google</a>
</body>
</html>
