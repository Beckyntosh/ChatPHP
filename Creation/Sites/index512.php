<?php
session_start();
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Encrypt and Decrypt functions
function encryptSessionData($data, $key) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

function decryptSessionData($data, $key) {
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $key, 0, $iv);
}

// Connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if session table exists, if not create it
$checkTable = "SHOW TABLES LIKE 'session_data'";
$result = $conn->query($checkTable);
if($result->num_rows == 0) {
    $createTable = "CREATE TABLE session_data (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        session_key VARCHAR(255) NOT NULL,
        encrypted_value TEXT NOT NULL,
        timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if(!$conn->query($createTable)) {
        die("Error creating table: " . $conn->error);
    }
}

$secret_key = 'my_secret_key'; // Normally this should be stored securely

// Handle Post Request for session storing
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];  // Example of data to encrypt
    $encryptedUsername = encryptSessionData($username, $secret_key);
    $sessionKey = session_id();

    $stmt = $conn->prepare("INSERT INTO session_data (session_key, encrypted_value) VALUES (?, ?)");
    $stmt->bind_param("ss", $sessionKey, $encryptedUsername);

    if($stmt->execute()) {
        echo "Session data saved successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Handle a get request to display session data
if(isset($_GET['action']) && $_GET['action'] == 'view') {
    $sessionKey = session_id();
    $stmt = $conn->prepare("SELECT encrypted_value FROM session_data WHERE session_key = ?");
    $stmt->bind_param("s", $sessionKey);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Username: " . decryptSessionData($row['encrypted_value'], $secret_key);
        }
    } else {
        echo "No data found";
    }
    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Secure Web Application</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Enter Username">
        <input type="submit" value="Save Session">
    </form>
    <a href="?action=view">View Session Data</a>
</body>
</html>