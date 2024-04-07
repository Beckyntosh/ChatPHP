
<?php
// Initialize connection variables
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

// Encrypt Function
function encryptData($data, $secretKey) {
    $ivLength = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = openssl_random_pseudo_bytes($ivLength);
    $encryptedData = openssl_encrypt($data, $cipher, $secretKey, 0, $iv);
    return base64_encode($encryptedData . '::' . $iv);
}

// For simplicity, using a fixed secret key. In real applications, securely generate and store this key
$secretKey = 'my_secure_key_123';

// Example function to send email (fictive, replace with a proper mail sending library in real applications)
function sendEncryptedEmail($to, $subject, $message, $secretKey) {
    $encryptedMessage = encryptData($message, $secretKey);
    // Code to send email, for the simplicity of this example, we'll just output the encrypted content.
    echo "Sending to: $to\nSubject: $subject\nEncrypted Message: $encryptedMessage\n\n";
}

// Assuming a form to collect email information or it could be triggered by an event
$email = 'user@example.com'; // This should come from an input or database normally
$subject = 'Your Sensitive Information';
$message = 'Here is some sensitive information just for you.';

sendEncryptedEmail($email, $subject, $message, $secretKey);

// Close connection
$conn->close();
?>
