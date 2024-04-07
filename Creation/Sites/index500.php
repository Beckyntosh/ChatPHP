<?php

$MYSQL_ROOT_PSWD = 'root';
$MYSQL_DB = 'my_database';
$servername = 'db';

$conn = new mysqli($servername, 'root', $MYSQL_ROOT_PSWD, $MYSQL_DB);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS EncryptedEmails (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    encrypted_message TEXT NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table EncryptedEmails created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

function encryptEmail($plaintext, $password) {
    $method = "AES-256-CBC";
    $key = hash('sha256', $password, true);
    $iv = openssl_random_pseudo_bytes(16);

    $ciphertext = openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv);
    $ivHex = bin2hex($iv);
    $ciphertextHex = bin2hex($ciphertext);

    return $ivHex . ":" . $ciphertextHex;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $message = $_POST["message"];
    $password = "secretPassword"; // This should be securely stored and retrieved

    $encryptedMessage = encryptEmail($message, $password);

    $stmt = $conn->prepare("INSERT INTO EncryptedEmails (email, encrypted_message) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $encryptedMessage);

    if ($stmt->execute()) {
        echo "Record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Send Encrypted Email</title>
</head>
<body>
    <form action="" method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" required></textarea><br>
        <input type="submit" value="Send Email">
    </form>
</body>
</html>