<?php
session_start();

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

// Function to safely encrypt session data
function encryptSessionData($data, $key) {
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext_raw = openssl_encrypt($data, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
    return base64_encode( $iv.$hmac.$ciphertext_raw );
}

// Function to decrypt session data
function decryptSessionData($ciphertext, $key) {
    $c = base64_decode($ciphertext);
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len=32);
    $ciphertext_raw = substr($c, $ivlen+$sha2len);
    $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
    $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
    if (hash_equals($hmac, $calcmac)) {
        return $original_plaintext;
    }
    return false;
}

$encryption_key = 'your_secret_key_here';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assume that user authentication is successful and session data is being set
    $_SESSION['user_data'] = encryptSessionData(json_encode(['user_id' => 1, 'role' => 'admin']), $encryption_key);
}

if (isset($_SESSION['user_data'])) {
    $decryptedSessionData = decryptSessionData($_SESSION['user_data'], $encryption_key);
    $userSessionData = json_decode($decryptedSessionData, true);
    // Now you have $userSessionData array to use for checking user access or displaying user info
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pet Supplies Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Welcome to the Happy Pet Supplies Store!</h1>
    <?php if(isset($userSessionData)): ?>
        <p>Hello, user <?= htmlspecialchars($userSessionData['user_id']) ?>!</p>
    <?php else: ?>
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <button type="submit">Login</button>
        </form>
    <?php endif; ?>
</div>
</body>
</html>
