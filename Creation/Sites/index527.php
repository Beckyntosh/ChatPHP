<?php
// Simple Encryption/Decryption script for demonstration. Use OpenSSL or a similar library for production.

// Database configuration
define('MYSQL_ROOT_PSWD', 'root');
define('MYSQL_DB', 'my_database');
define('MYSQL_HOST', 'db');
define('MYSQL_USER', 'root');

// Encryption and Decryption keys - For demonstration purposes only. Use a secure method to generate and store keys.
define('ENCRYPTION_KEY', 'example_key');
define('ENCRYPTION_METHOD', 'AES-256-CBC');

// Connect to Database
try {
    $pdo = new PDO("mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DB, MYSQL_USER, MYSQL_ROOT_PSWD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create table if it does not exist
    $sql = "CREATE TABLE IF NOT EXISTS user_tokens (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT NOT NULL,
                token VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";
    $pdo->exec($sql);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

// Functions for Encrypt and Decrypt
function encryptCookie($data){
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(ENCRYPTION_METHOD));
    $encrypted = openssl_encrypt($data, ENCRYPTION_METHOD, ENCRYPTION_KEY, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

function decryptCookie($data){
    list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2), 2, null);
    return openssl_decrypt($encrypted_data, ENCRYPTION_METHOD, ENCRYPTION_KEY, 0, $iv);
}

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['token'])) {
    // Encrypt user token and set a cookie
    $encryptedToken = encryptCookie($_POST['token']);
    setcookie("userToken", $encryptedToken, time() + (86400 * 30), "/"); // 86400 = 1 day

    // Store in database
    $stmt = $pdo->prepare("INSERT INTO user_tokens (user_id, token) VALUES (?, ?)");
    $stmt->execute([1, $encryptedToken]); // Assuming user_id is 1 for this demonstration
}

// Check for cookie
if(isset($_COOKIE['userToken'])) {
    $userToken = decryptCookie($_COOKIE['userToken']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Encrypt User Token in Cookie</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type="text"], button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
        }
        button {
            background-color: #5cb85c;
            color: white;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Enter Authentication Token</h2>
        <form method="POST">
            <input type="text" name="token" placeholder="Token" required>
            <button type="submit">Encrypt & Save</button>
        </form>
        
        <?php if(isset($userToken)): ?>
            <h4>Decrypted Token: <?php echo htmlspecialchars($userToken); ?></h4>
        <?php endif; ?>
    </div>
</body>
</html>