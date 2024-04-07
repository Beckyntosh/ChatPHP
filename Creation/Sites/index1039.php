<?php
session_start();

// Encrypt session function
function encryptSessionData($data, $key) {
    if(!isset($key) || $key === null) {
        // No encryption key provided
        return null;
    }
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext_raw = openssl_encrypt($data, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
    return base64_encode($iv.$hmac.$ciphertext_raw);
}

// Decrypt session function
function decryptSessionData($ciphertext, $key) {
    if(!isset($key) || $key === null) {
        // No decryption key provided
        return null;
    }
    $c = base64_decode($ciphertext);
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len=32);
    $ciphertext_raw = substr($c, $ivlen+$sha2len);
    $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
    $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
    
    if (hash_equals($hmac, $calcmac)) { // timing attack safe comparison
        return $original_plaintext;
    }
    
    return null;
}

$encryptionKey = 'your_encryption_key_here'; // Change this to a unique encryption key for your application

// Database connection
$servername = "db";
$username = "root";
$password = 'root';
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create session table (id, session_data) if not exists
$sql = "CREATE TABLE IF NOT EXISTS user_session (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
session_data TEXT NOT NULL,
reg_date TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    // Table created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

// Example: Setting a session variable
$_SESSION['user_data'] = encryptSessionData('Sensitive information here', $encryptionKey);

// Storing encrypted session data in database
$encryptedSessionData = $conn->real_escape_string($_SESSION['user_data']);
$sql = "INSERT INTO user_session (session_data) VALUES ('$encryptedSessionData')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Example: Accessing a session variable
$decryptedSessionData = decryptSessionData($_SESSION['user_data'], $encryptionKey);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hair Care Products Website</title>
</head>
<body>
    <h1>Welcome to Our Hair Care Products Website</h1>
    <p>Your encrypted session data: <?php echo htmlspecialchars($_SESSION['user_data']); ?></p>
    <p>Your decrypted session data: <?php echo htmlspecialchars($decryptedSessionData); ?></p>
</body>
</html>
