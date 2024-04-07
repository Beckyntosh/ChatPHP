<?php
// Simple Encryption for User Communications in a Feedback Form
// Paranoid Maternity Wear Website Example

// Database Configuration
$dbHost = 'db';
$dbUsername = 'root';
$dbPassword = 'root';
$dbName = 'my_database';

// Connect to the database
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Feedback Table if it does not exist
$tableSql = "CREATE TABLE IF NOT EXISTS feedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    message VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
)";
if (!$conn->query($tableSql)) {
    die("Error creating table: " . $conn->error);
}

// Simple Encryption Function
function simpleEncrypt($text, $salt = 'SimpleEncryptionSalt') {
    return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
}

// Simple Decryption Function (used for displaying messages)
function simpleDecrypt($text, $salt = 'SimpleEncryptionSalt') {
    return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $salt, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
}

// Check if data was posted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['feedbackMessage'])) {
    // Encrypt the message from the form
    $encryptedMessage = simpleEncrypt($_POST['feedbackMessage']);
    
    // Insert the encrypted message into the database
    $insertSql = "INSERT INTO feedback (message) VALUES ('$encryptedMessage')";
    
    if (!$conn->query($insertSql)) {
        die("Error: " . $sql . "<br>" . $conn->error);
    }
    
    echo "Feedback sent successfully!";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedback Form - Paranoid Maternity Wear</title>
</head>
<body>
    <h1>Send us your Feedback</h1>
    <form method="post">
        <textarea name="feedbackMessage" required></textarea>
        <button type="submit">Send Feedback</button>
    </form>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>