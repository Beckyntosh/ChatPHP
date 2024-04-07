<?php

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

// Create table for user messages if not exists
$sql = "CREATE TABLE IF NOT EXISTS user_messages (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    sender_id VARCHAR(30) NOT NULL,
    receiver_id VARCHAR(30) NOT NULL,
    message TEXT NOT NULL,
    encryption_key VARCHAR(64) NOT NULL,
    iv VARCHAR(32) NOT NULL,
    reg_date TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

function encrypt($plaintext, $key) {
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
    return base64_encode( $iv.$hmac.$ciphertext_raw );
}

function decrypt($ciphertext, $key) {
    $c = base64_decode($ciphertext);
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len=32);
    $ciphertext_raw = substr($c, $ivlen+$sha2len);
    $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
    $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
    if (hash_equals($hmac, $calcmac)) // timing attack safe comparison
    {
        return $original_plaintext;
    }
    return false;
}

// Insert message if post request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sender_id']) && isset($_POST['receiver_id']) && isset($_POST['message']) && isset($_POST['encryption_key'])) {
    $sender_id = $conn->real_escape_string($_POST['sender_id']);
    $receiver_id = $conn->real_escape_string($_POST['receiver_id']);
    $message = $conn->real_escape_string($_POST['message']);
    $encryption_key = $conn->real_escape_string($_POST['encryption_key']);
  
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = openssl_random_pseudo_bytes($ivlen);
    $encrypted_message = encrypt($message, $encryption_key);
    
    $sql = "INSERT INTO user_messages (sender_id, receiver_id, message, encryption_key, iv)
    VALUES ('$sender_id', '$receiver_id', '$encrypted_message', '$encryption_key', '".bin2hex($iv)."')";

    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Encrypted Messaging</title>
</head>
<body>
<form action="?" method="POST">
    Sender ID:<br>
    <input type="text" name="sender_id" required><br>
    Receiver ID:<br>
    <input type="text" name="receiver_id" required><br>
    Message:<br>
    <textarea name="message" required></textarea><br>
    Encryption Key (Please keep this safe):<br>
    <input type="text" name="encryption_key" required><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>

<?php
$conn->close();
?>
