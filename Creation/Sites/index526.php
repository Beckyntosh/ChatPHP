<?php
// Sample Web Application for Encrypting Cookie Data
// Note: For educational purposes. Make sure to implement additional security measures for a real-world application.

// Database connection details
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to MySQL Database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Encryption and Decryption keys (should be stored securely, not in the source code in real-world applications)
define('ENCRYPTION_KEY', 'your_secret_key_here');
define('IV', 'your_initialization_vector');

// Encrypt function
function encryptCookie($value){
    return openssl_encrypt($value, 'aes-256-cbc', ENCRYPTION_KEY, 0, IV);
}

// Decrypt function
function decryptCookie($ciphertext){
    return openssl_decrypt($ciphertext, 'aes-256-cbc', ENCRYPTION_KEY, 0, IV);
}

// Example: Setting an encrypted cookie with user authentication token
$userToken = "userAuthenticationToken123"; // This would be dynamically generated in a real scenario
$encryptedToken = encryptCookie($userToken);
setcookie('auth_token', $encryptedToken, time() + (86400 * 30), "/"); // 86400 = 1 day

// HTML Structure for the Smartphones Website
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Smartphones Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Welcome to the Smartphones Website</h1>
    <p>Your encrypted authentication token is set in cookies.</p>
</div>
</body>
</html>

<?php
// Example: Retrieving and decrypting the authentication token from cookies
if(isset($_COOKIE['auth_token'])) {
    $decryptedToken = decryptCookie($_COOKIE['auth_token']);
    echo "<div class='container'>";
    echo "<p>Decrypted Token: " . htmlspecialchars($decryptedToken) . "</p>";
    echo "</div>";
}
?>