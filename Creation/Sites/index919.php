<?php
// This script is a simplified version of what an actual application might look like. It's intended for educational purposes only.

// Establish database connection
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

// Create table for storing encrypted emails
$sql = "CREATE TABLE IF NOT EXISTS encrypted_emails (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
subject VARCHAR(50) NOT NULL,
message TEXT NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table encrypted_emails created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Function to encrypt messages
function encryptMessage($message, $encryption_key)
{
    $ciphering = "AES-128-CTR";
    $options = 0;
    $encryption_iv = '1234567891011121'; // 16 bytes
    return openssl_encrypt($message, $ciphering, $encryption_key, $options, $encryption_iv);
}

// Function to send email (simulation)
function sendEmail($email, $subject, $message) {
  // In a real application, you would use a mail library here
  // This function only simulates email sending for demonstration purposes
  echo "Sending encrypted email to: $email\n";
  echo "Subject: $subject\n";
  echo "Message: $message\n";
}

// Encrypt and send an email
$encryption_key = "yourEncryptionKey"; // This should be securely generated and stored
$email = "example@domain.com";
$subject = "Your Order Details";
$message = "Thank you for purchasing from our furniture store!";

// Encrypt the message
$encryptedMessage = encryptMessage($message, $encryption_key);

// Insert encrypted email into the database
$stmt = $conn->prepare("INSERT INTO encrypted_emails (email, subject, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $email, $subject, $encryptedMessage);

if ($stmt->execute() === TRUE) {
  echo "New encrypted email record created successfully.\n";
  // Simulate email sending
  sendEmail($email, $subject, $encryptedMessage);
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

---
**Auto-generated explanation**: The script showcases a PHP application that encrypts emails before storing and 'sending' them (simulation). It manages a MySQL database connection to store email information securely. It's important to adapt this basic framework to your specific project needs, ensuring proper security measures are in place for production environments.