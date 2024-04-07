<?php
// Simple Web Application for Basic Data Encryption in User Communications
// Note: This is a simplified example and not production-ready. Security features like input validation, CSRF protection, and more robust error handling should be implemented.

// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Encryption Configuration
define('ENCRYPTION_KEY', 'your_secret_key_here');
define('ENCRYPTION_METHOD', 'AES-256-CBC');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

function encryptText($plaintext){
    $ivlen = openssl_cipher_iv_length(ENCRYPTION_METHOD);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext_raw = openssl_encrypt($plaintext, ENCRYPTION_METHOD, ENCRYPTION_KEY, $options=OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext_raw, ENCRYPTION_KEY, $as_binary=true);
    return base64_encode( $iv.$hmac.$ciphertext_raw );
}

function decryptText($ciphertext){
    $c = base64_decode($ciphertext);
    $ivlen = openssl_cipher_iv_length(ENCRYPTION_METHOD);
    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len=32);
    $ciphertext_raw = substr($c, $ivlen+$sha2len);
    $original_plaintext = openssl_decrypt($ciphertext_raw, ENCRYPTION_METHOD, ENCRYPTION_KEY, $options=OPENSSL_RAW_DATA, $iv);
    $calcmac = hash_hmac('sha256', $ciphertext_raw, ENCRYPTION_KEY, $as_binary=true);
    if (hash_equals($hmac, $calcmac)) { // timing attack safe comparison
        return $original_plaintext;
    }
    return false;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["message"])) {
    $encryptedMessage = encryptText($_POST["message"]);

    // Insert encrypted message into database
    try {
        $sql = "INSERT INTO messages (content) VALUES (:content)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':content', $encryptedMessage, PDO::PARAM_STR);
        $stmt->execute();
        echo "<p>Message sent successfully!</p>";
    } catch(PDOException $e) {
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secure User Communication</title>
</head>
<body>
    <h2>Send a Secure Message</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    // Attempt to fetch and decrypt messages
    try {
        $sql = "SELECT * FROM messages";
        $stmt = $pdo->query($sql);
        if($stmt->rowCount() > 0) {
            echo "<h2>Received Messages</h2>";
            while($row = $stmt->fetch()){
                echo "<p>" . decryptText($row['content']) . "</p>";
            }
        } else{
            echo "<p>No messages received yet.</p>";
        }
    } catch(PDOException $e) {
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
    ?>
</body>
</html>

**Important Note:**
As requested, this is a basic example of how to encrypt data for a simple web application using PHP, with the frontend included in the same file, aiming for the simplicity reminiscent of early software projects. However, remember that deploying a secure web application requires much more than PHP encryption functions. Consider consulting a security professional for more comprehensive protection measures, especially if handling sensitive information.