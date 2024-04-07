
<?php

// Database connection
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'my_database');

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for storing encrypted emails if not exists
$sql = "CREATE TABLE IF NOT EXISTS encrypted_emails (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email_address VARCHAR(255) NOT NULL,
email_content LONGTEXT NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Encrypting function
function encryptEmail($plaintext, $password) {
    $method = "AES-256-CBC";
    $key = hash('sha256', $password, true);
    $iv = openssl_random_pseudo_bytes(16);

    $ciphertext = openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv);
    $hash = hash_hmac('sha256', $ciphertext . $iv, $key, true);

    return base64_encode($iv . $hash . $ciphertext);
}

// Decrypting function
function decryptEmail($encrypted, $password) {
    $encrypted = base64_decode($encrypted);
    $method = "AES-256-CBC";
    $key = hash('sha256', $password, true);

    $iv = substr($encrypted, 0, 16);
    $hash = substr($encrypted, 16, 32);
    $ciphertext = substr($encrypted, 48);
    $calculatedHash = hash_hmac('sha256', $ciphertext . $iv, $key, true);

    if (!hash_equals($hash, $calculatedHash)) {
        return null;
    }

    return openssl_decrypt($ciphertext, $method, $key, OPENSSL_RAW_DATA, $iv);
}

// HTML and PHP to manage encryption and storage
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"]) && isset($_POST["content"])) {
    $emailAddress = $_POST["email"];
    $emailContent = $_POST["content"];
    $encryptionKey = "your_secret_key"; // Change this to your actual encryption key
    $encryptedContent = encryptEmail($emailContent, $encryptionKey);

    // Store in DB
    $stmt = $conn->prepare("INSERT INTO encrypted_emails (email_address, email_content) VALUES (?, ?)");
    $stmt->bind_param("ss", $emailAddress, $encryptedContent);
    if ($stmt->execute()) {
        echo "Email stored and encrypted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Encrypt and Store Email</title>
</head>
<body>

    <h2>Send and Encrypt Email</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Email: <input type="email" name="email" required><br>
        Content:<br> <textarea name="content" required></textarea><br>
        <input type="submit" value="Send Email">
    </form>

</body>
</html>
<?php
$conn->close();
?>
