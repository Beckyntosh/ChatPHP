<?php
session_start();
$secretKey = 'your_secret_key'; // Change this to your actual secret key
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

// ===== Database Configuration =====
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

// ===== Create Table for Session Data if not exists =====
$tableSql = "CREATE TABLE IF NOT EXISTS user_sessions (
    session_id VARCHAR(255) NOT NULL PRIMARY KEY,
    session_data TEXT NOT NULL,
    session_expiry INT(11) NOT NULL
);";
if (!$conn->query($tableSql)) {
    die("Error creating table: " . $conn->error);
}

// ===== Custom Session Handlers =====
function encryptSessionData($data, $key, $iv) {
    return base64_encode(openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv));
}

function decryptSessionData($data, $key, $iv) {
    return openssl_decrypt(base64_decode($data), 'aes-256-cbc', $key, 0, $iv);
}

function openSession($savePath, $sessionName) {
    global $conn;
    return true;
}

function closeSession() {
    global $conn;
    $conn->close();
    return true;
}

function readSession($id) {
    global $conn, $secretKey, $iv;
    $sql = "SELECT session_data FROM user_sessions WHERE session_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($encryptedData);
        $stmt->fetch();
        return decryptSessionData($encryptedData, $secretKey, $iv);
    } else {
        return "";
    }
}

function writeSession($id, $data) {
    global $conn, $secretKey, $iv;
    $encryptedData = encryptSessionData($data, $secretKey, $iv);
    $expiry = time() + (60 * 60); // 1-hour session expiry
    $sql = "REPLACE INTO user_sessions (session_id, session_data, session_expiry) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $id, $encryptedData, $expiry);
    return $stmt->execute();
}

function destroySession($id) {
    global $conn;
    $sql = "DELETE FROM user_sessions WHERE session_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    return $stmt->execute();
}

function cleanSession($maxlifetime) {
    global $conn;
    $old = time() - $maxlifetime;
    $sql = "DELETE FROM user_sessions WHERE session_expiry < ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $old);
    return $stmt->execute();
}

session_set_save_handler("openSession", "closeSession", "readSession", "writeSession", "destroySession", "cleanSession", true);

// ===== Start or Resume Session =====
session_start();

// ====== Insert your application logic here ======

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jewelry Website</title>
    <style>
        /* Add your CSS styles for the website here */
    </style>
</head>
<body>
Your HTML content goes here

    <script>
        // Your JavaScript for frontend goes here
    </script>
</body>
</html>