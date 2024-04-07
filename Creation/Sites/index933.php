<?php
// Database connection settings
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

// Create messages table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS messages (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    sender VARCHAR(30) NOT NULL,
    receiver VARCHAR(30) NOT NULL,
    message TEXT NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo ""; // Table created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

// Encrypt and decrypt functions
function encrypt($plaintext, $password) {
    $method = "AES-256-CBC";
    $key = hash('sha256', $password, true);
    $iv = openssl_random_pseudo_bytes(16);
    $ciphertext = openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv);
    return base64_encode($iv.$ciphertext);
}

function decrypt($encrypted, $password) {
    $encrypted = base64_decode($encrypted);
    $method = "AES-256-CBC";
    $iv = substr($encrypted, 0, 16);
    $ciphertext = substr($encrypted, 16);
    $key = hash('sha256', $password, true);
    return openssl_decrypt($ciphertext, $method, $key, OPENSSL_RAW_DATA, $iv);
}

// Insert and fetch encrypted messages
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sender = $conn->real_escape_string($_POST['sender']);
    $receiver = $conn->real_escape_string($_POST['receiver']);
    $message = $conn->real_escape_string($_POST['message']);
    $encryptedMessage = encrypt($message, "secretPassword");

    $sql = "INSERT INTO messages (sender, receiver, message) VALUES ('$sender', '$receiver', '$encryptedMessage')";

    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secure Chat</title>
</head>
<body>
    <h2>Send a secure message</h2>
    <form action="" method="post">
        <input type="text" name="sender" placeholder="Sender" required><br><br>
        <input type="text" name="receiver" placeholder="Receiver" required><br><br>
        <textarea name="message" placeholder="Your message" required></textarea><br><br>
        <button type="submit" name="send">Send Message</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $sql = "SELECT id, sender, receiver, message, reg_date FROM messages";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div><strong>From:</strong> " . $row["sender"]. " <strong>To:</strong> ". $row["receiver"]. " <strong>Message:</strong> " . decrypt($row["message"], "secretPassword") . "<br><strong>Time:</strong> " . $row["reg_date"]."</div><br>";
            }
        } else {
            echo "0 results";
        }
    }
    ?>

</body>
</html>

<?php
$conn->close();
?>
