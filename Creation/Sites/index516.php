<?php
// Disclaimer: This is a simplified example and shouldn't be used in production without further security measures

// Database connection
define("MYSQL_ROOT_PSWD", "root");
define("MYSQL_DB", "my_database");
$servername = "db";
$username = "root";
$password = MYSQL_ROOT_PSWD;
$dbname = MYSQL_DB;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create messages table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS messages (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    sender_id INT(6) UNSIGNED,
    receiver_id INT(6) UNSIGNED,
    message TEXT,
    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure Chat</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
    <script>
        function encryptMessage(message, passphrase) {
            return CryptoJS.AES.encrypt(message, passphrase).toString();
        }

        function decryptMessage(ciphertext, passphrase) {
            var bytes = CryptoJS.AES.decrypt(ciphertext, passphrase);
            return bytes.toString(CryptoJS.enc.Utf8);
        }

        async function sendMessage() {
            var senderId = document.getElementById("senderId").value;
            var receiverId = document.getElementById("receiverId").value;
            var message = document.getElementById("message").value;
            var passphrase = "secret passphrase"; // Should be dynamically generated or securely shared between parties

            var encryptedMessage = encryptMessage(message, passphrase);

            var formData = new FormData();
            formData.append('sender_id', senderId);
            formData.append('receiver_id', receiverId);
            formData.append('message', encryptedMessage);

            let response = await fetch('chat.php', {
                method: 'POST',
                body: formData
            });

            let result = await response.text();
            console.log(result);
            alert("Message sent!");
        }
    </script>
</head>
<body>
    <div>
        <input type="number" id="senderId" placeholder="Sender ID">
        <input type="number" id="receiverId" placeholder="Receiver ID">
        <textarea id="message" placeholder="Type your message here..."></textarea>
        <button onclick="sendMessage()">Send Message</button>
    </div>
    <div id="messages"></div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sender_id = intval($_POST["sender_id"]);
    $receiver_id = intval($_POST["receiver_id"]);
    $encryptedMessage = $_POST["message"];

    $sql = "INSERT INTO messages (sender_id, receiver_id, message) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $sender_id, $receiver_id, $encryptedMessage);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>