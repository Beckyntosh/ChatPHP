<?php
session_start();

// Define database connection parameters
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DATABASE', 'my_database');
define('MYSQL_SERVER', 'db');

// Function to get the database connection
function getDBConnection() {
    $dsn = 'mysql:host=' . MYSQL_SERVER . ';dbname=' . MYSQL_DATABASE;
    try {
        $pdo = new PDO($dsn, MYSQL_USER, MYSQL_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die('Connection failed: ' . $e->getMessage());
    }
}

// Encrypt and decrypt functions
function encryptSessionData($data, $key){
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext_raw = openssl_encrypt($data, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
    return base64_encode( $iv.$hmac.$ciphertext_raw );
}

function decryptSessionData($c, $key){
    $c = base64_decode($c);
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len=32);
    $ciphertext_raw = substr($c, $ivlen+$sha2len);
    $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
    $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
    if (hash_equals($hmac, $calcmac)) // timing attack safe comparison
    {
        return $original_plaintext;
    }
    return false;
}

// Key for encryption/decryption
// In a real application, you would want this key to be highly protected and not hard-coded.
$encryption_key = 'your_secret_key_here';

// Check if user is logging in
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    // Possibly you would want to do more verification here
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Encrypt user data before saving it into session
    $_SESSION['user_data'] = encryptSessionData(serialize(array('username' => $username)), $encryption_key);

    // Redirect or perform other logic after login
    echo "User logged in successfully."; // For simplicity
}

// Check if user data exists in session and decrypt
if (isset($_SESSION['user_data'])) {
    $user_data = decryptSessionData($_SESSION['user_data'], $encryption_key);
    if ($user_data) {
        $user_data = unserialize($user_data);
        echo "Welcome back, " . htmlspecialchars($user_data['username']);
    } else {
        echo "Failed to decrypt user data.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Skateboards Website - Secure Session</title>
</head>
<body style="background-color: #f0ad4e; font-family: Arial, sans-serif;">
    <h1>Skateboards - Login</h1>
    <form method="POST" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
