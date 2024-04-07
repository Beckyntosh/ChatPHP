<?php
// Basic PHP script for User-to-User Communication Encryption on a Sunglasses Website in a Post-Apocalyptic Style

// Database Configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for storing encrypted messages if not exists
$sql = "CREATE TABLE IF NOT EXISTS encrypted_messages (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
message TEXT NOT NULL,
creation_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Function to encrypt messages
function encryptMessage($message, $encryptionKey) {
  return openssl_encrypt($message, "AES-128-ECB", $encryptionKey);
}

// Function to decrypt messages (for demonstration purposes)
function decryptMessage($encryptedMessage, $encryptionKey) {
  return openssl_decrypt($encryptedMessage, "AES-128-ECB", $encryptionKey);
}

$encryptionKey = "secretKey";
$messageError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST["message"])) {
    $message = $_POST["message"];
    // Encrypt the message before saving to database
    $encryptedMessage = encryptMessage($message, $encryptionKey);
    $sql = "INSERT INTO encrypted_messages (message) VALUES ('".$encryptedMessage."')";

    if ($conn->query($sql) === TRUE) {
      // Message encrypted and stored successfully
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    $messageError = "Please enter a message.";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post-Apocalyptic Sunglasses Shop - Send Encrypted Feedback</title>
    <style>
        body {
            background-color: #333;
            color: limegreen;
            font-family: monospace;
        }
        .container {
            margin: auto;
            width: 50%;
            border: 2px solid #444;
            padding: 20px;
            text-align: center;
        }
        input[type=text], textarea {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            background-color: #222;
            color: lime;
        }
        button {
            background-color: #444;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Send Your Feedback</h2>
    <p>Your message will be encrypted for privacy.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="message">Message:</label>
        <textarea id="message" name="message" required><?php if(isset($_POST["message"])) echo htmlspecialchars($_POST["message"]); ?></textarea>
        <span style="color:red"><?php echo $messageError;?></span>
        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>
