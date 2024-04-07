<?php

session_start();

define('MYSQL_ROOT_PSWD', 'root');
define('MYSQL_DB', 'my_database');
define('ENCRYPTION_KEY', 'your-encryption-key-here'); // Change this key

// Create connection
$conn = new mysqli('db', 'root', MYSQL_ROOT_PSWD, MYSQL_DB);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$table_sql = "CREATE TABLE IF NOT EXISTS user_sessions (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    session_id VARCHAR(256) NOT NULL,
    session_data TEXT NOT NULL,
    access TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!$conn->query($table_sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

function encryptData($data, $key) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

function decryptData($data, $key) {
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $key, 0, $iv);
}

function readSession($id) {
    global $conn;
    $sql = $conn->prepare("SELECT session_data FROM user_sessions WHERE session_id = ?");
    $sql->bind_param("s", $id);
    $sql->execute();
    $result = $sql->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return decryptData($row['session_data'], ENCRYPTION_KEY);
    }
    return '';
}

function writeSession($id, $data) {
    global $conn;
    $encryptedData = encryptData($data, ENCRYPTION_KEY);
    $sql = $conn->prepare("REPLACE INTO user_sessions (session_id, session_data) VALUES (?, ?)");
    $sql->bind_param("ss", $id, $encryptedData);
    $sql->execute();
}

function destroySession($id) {
    global $conn;
    $sql = $conn->prepare("DELETE FROM user_sessions WHERE session_id = ?");
    $sql->bind_param("s", $id);
    $sql->execute();
}

session_set_save_handler("readSession", "writeSession", "destroySession", "sessionOpen", "sessionClose");

function sessionOpen($savePath, $sessionName) {
    return true;
}

function sessionClose() {
    return true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secure DVD Collection</title>
</head>
<body>
    <h1>Welcome to My Secure DVD Collection</h1>
    <?php
    if (!isset($_SESSION['views'])) {
        $_SESSION['views'] = 1;
    } else {
        $_SESSION['views']++;
    }
    ?>
    <p>Page views: <?= $_SESSION['views'] ?></p>
    <p>Browse the collection securely.</p>
</body>
</html>
<?php
// Write the session data and end the session
session_write_close();
?>
