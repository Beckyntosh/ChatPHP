<?php
// Simplified example of an end-to-end encryption messaging feature in PHP with frontend.

// !IMPORTANT: This example lacks proper security measures and error handling for brevity.
// It is crucial to implement additional security features and error handling in production.

// Database Connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

// Create messages table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS messages (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    sender VARCHAR(30) NOT NULL,
    receiver VARCHAR(30) NOT NULL,
    message TEXT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

$conn->exec($sql);

// Frontend: Simple form for sending a message
?>
<!DOCTYPE html>
<html>
<head>
    <title>Encrypted Messaging</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
</head>
<body>
    <h2>Send a Secure Message</h2>
    <form id="messageForm">
        Sender: <input type="text" name="sender" id="sender"><br>
        Receiver: <input type="text" name="receiver" id="receiver"><br>
        Message: <textarea name="message" id="message"></textarea><br>
        <input type="submit" value="Send">
    </form>

    <script>
        document.getElementById("messageForm").onsubmit = function(e) {
            e.preventDefault();
            
            // Simulate the generation of a shared secret (e.g., using Diffie-Hellman during user's session establishment)
            var secret = "shared_secret";

            // Encrypt the message with AES
            var encrypted = CryptoJS.AES.encrypt(document.getElementById("message").value, secret).toString();

            // Example of sending the encrypted data to the server using fetch API
            fetch('', {
                method: 'POST',
                body: JSON.stringify({
                    sender: document.getElementById("sender").value,
                    receiver: document.getElementById("receiver").value,
                    message: encrypted
                }),
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then(response => response.text()).then(data => {
                console.log(data);
                alert('Message sent securely!');
            }).catch((error) => {
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>

<?php
// Backend part for storing the encrypted message
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = file_get_contents('php://input');
    $decoded = json_decode($content, true);
    
    // Assuming $decoded['message'] is already encrypted by the client's browser.
    $sql = $conn->prepare("INSERT INTO messages (sender, receiver, message) VALUES (?, ?, ?)");
    $sql->execute([
        $decoded['sender'],
        $decoded['receiver'],
        $decoded['message']
    ]);
    echo "Message received and stored securely.";
}
?>
