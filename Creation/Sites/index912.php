
<?php

// Database Configuration
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

// Create table for notification emails if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS notification_emails (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50),
subject VARCHAR(100),
message TEXT,
enc_message TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table notification_emails created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Encryption and Decryption keys
$encryption_key = openssl_random_pseudo_bytes(32);
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

function encryptEmailContent($plaintext, $encryption_key, $iv)
{
  return openssl_encrypt($plaintext, 'aes-256-cbc', $encryption_key, 0, $iv);
}

function decryptEmailContent($ciphertext, $encryption_key, $iv)
{
  return openssl_decrypt($ciphertext, 'aes-256-cbc', $encryption_key, 0, $iv);
}

// Encrypt and save the email content to the database
$email = 'test@example.com';
$subject = 'New Notification';
$message = 'This is a sensitive email content: User info';

$enc_message = encryptEmailContent($message, $encryption_key, $iv);

$sql = $conn->prepare("INSERT INTO notification_emails (email, subject, message, enc_message) VALUES (?, ?, ?, ?)");
$sql->bind_param("ssss", $email, $subject, $message, $enc_message);

if ($sql->execute() === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql->close();

//A front-end form to trigger email encryption (for simulation purposes)
?>
<!DOCTYPE html>
<html>
<head>
    <title>Encrypt Email - Magazine Website</title>
</head>
<body>
    <form action="" method="post">
        <h2>Send Encrypted Email</h2>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="subject">Subject:</label>
            <input type="text" name="subject" id="subject" required>
        </div>
        <div>
            <label for="message">Message:</label>
            <textarea name="message" id="message" required></textarea>
        </div>
        <button type="submit" name="sendEmail">Send Email</button>
    </form>
</body>
</html>

<?php

// Handling the form submission
if(isset($_POST['sendEmail'])) {
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $enc_message = encryptEmailContent($message, $encryption_key, $iv);
    
    $sql = $conn->prepare("INSERT INTO notification_emails (email, subject, message, enc_message) VALUES (?, ?, ?, ?)");
    $sql->bind_param("ssss", $email, $subject, $message, $enc_message);
    
    if ($sql->execute() === TRUE) {
      echo "<p>Email sent successfully (encrypted)!</p>";
    } else {
      echo "<p>Error while sending email: " . $conn->error . "</p>";
    }
    
    $sql->close();
}


$conn->close();
?>
