<?php

// Avoiding execution if the request is not through POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

// Database configuration
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DATABASE', 'my_database');
define('MYSQL_SERVER', 'db');

// Encryption key (typically, you would want this stored in a safer place)
define('ENCRYPTION_KEY', 'your_secret_key_here');

// Establish MYSQL connection
try {
    $pdo = new PDO("mysql:host=" . MYSQL_SERVER . ";dbname=" . MYSQL_DATABASE, MYSQL_USER, MYSQL_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: Could not connect. " . $e->getMessage());
}

// Function to safely encrypt messages
function encryptMessage($message, $encryption_key) {
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = openssl_random_pseudo_bytes($ivlen);
    $encryptedMessage = openssl_encrypt($message, $cipher, $encryption_key, $options=0, $iv);
    return base64_encode($encryptedMessage . "::" . $iv);
}

// Function to safely decrypt messages
function decryptMessage($encryptedMessage, $encryption_key) {
    list($encrypted_data, $iv) = explode('::', base64_decode($encryptedMessage), 2);
    return openssl_decrypt($encrypted_data, $cipher="AES-128-CBC", $encryption_key, $options=0, $iv);
}

// Check for message submission
if (!empty($_POST['message'])) {
    $message = $_POST['message'];
    $encryptedMessage = encryptMessage($message, ENCRYPTION_KEY);

    // SQL to insert encrypted message
    $sql = "INSERT INTO messages (message) VALUES (:message)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['message' => $encryptedMessage]);

    echo "Message sent successfully!";
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secure Messaging</title>
</head>
<body>
    <h2>Send a Secure Message</h2>
    <form method="post">
        <label for="message">Message:</label>
        <textarea id="message" name="message"></textarea>
        <button type="submit">Send</button>
    </form>
</body>
</html>

Note: 
1. Remember to replace the placeholder `your_secret_key_here` with your actual encryption key.
2. Ensure the database `my_database` exists and table `messages` with at least one column named `message` is created before running this script.
3. Practice good security hygiene: use complex, unique passwords for your MySQL root user, don't expose sensitive keys in your source code, and keep your software up to date.