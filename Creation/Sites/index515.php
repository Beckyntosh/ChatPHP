<?php
$host = "db";
$dbname = "my_database";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Table creation if not exists
    $sql = "CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(30) NOT NULL
            );";
    $conn->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS messages (
                id INT AUTO_INCREMENT PRIMARY KEY,
                sender_id INT,
                receiver_id INT,
                message TEXT,
                FOREIGN KEY (sender_id) REFERENCES users(id),
                FOREIGN KEY (receiver_id) REFERENCES users(id)
            );";
    $conn->exec($sql);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

function encryptMessage($message, $key) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encryptedMessage = openssl_encrypt($message, 'aes-256-cbc', $key, 0, $iv);
    return base64_encode($encryptedMessage . '::' . $iv);
}

function decryptMessage($encryptedMessageWithIv, $key) {
    list($encryptedMessage, $iv) = explode('::', base64_decode($encryptedMessageWithIv), 2);
    return openssl_decrypt($encryptedMessage, 'aes-256-cbc', $key, 0, $iv);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['sender']) && !empty($_POST['receiver']) && !empty($_POST['message']) && !empty($_POST['key'])) {
        $encryptedMessage = encryptMessage($_POST['message'], $_POST['key']);
        
        $stmt = $conn->prepare("INSERT INTO messages (sender_id, receiver_id, message) VALUES ((SELECT id FROM users WHERE username = :sender), (SELECT id FROM users WHERE username = :receiver), :message)");
        $stmt->execute([
            'sender' => $_POST['sender'],
            'receiver' => $_POST['receiver'],
            'message' => $encryptedMessage
        ]);
        echo "<html><body><p>Message sent successfully!</p></body></html>";
    } else {
        echo "<html><body><p>Missing information!</p></body></html>";
    }
} else {
    // HTML form for sending a message
    echo <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <title>Medieval Toy Chat</title>
    <style>
        body { font-family: 'Times New Roman', Times, serif; background: #f4e8c1; }
        form { background: #d3c0a5; padding: 20px; border-radius: 10px; width: 300px; margin: auto; }
        input[type=text], input[type=password] { width: 280px; margin-bottom: 10px; }
        input[type=submit] { width: 304px; }
    </style>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="sender" placeholder="Sender Username" required>
        <input type="text" name="receiver" placeholder="Receiver Username" required>
        <input type="text" name="message" placeholder="Enter your message here" required>
        <input type="password" name="key" placeholder="Encryption Key" required>
        <input type="submit" value="Send">
    </form>
</body>
</html>
HTML;
}
?>
