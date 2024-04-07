<?php
// DATABASE CONNECTION
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

// Create table if not exists
$tableQuery = "CREATE TABLE IF NOT EXISTS feedback (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
message VARCHAR(255) NOT NULL,
enc_message VARCHAR(255) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($tableQuery) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// SIMPLE ENCRYPTION FUNCTION
function simpleEncrypt($text, $salt = 'simpleSalt') {
    return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $text, MCRYPT_MODE_ECB)));
}

// SIMPLE DECRYPTION FUNCTION
function simpleDecrypt($text, $salt = 'simpleSalt') {
    return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $salt, base64_decode($text), MCRYPT_MODE_ECB));
}

// FORM SUBMISSION
if(isset($_POST['submit'])) {
    $message = $conn->real_escape_string($_POST['message']);
    $enc_message = simpleEncrypt($message); // Encrypt the message
    
    $insertQuery = "INSERT INTO feedback (message, enc_message) VALUES ('$message', '$enc_message')";
    
    if ($conn->query($insertQuery) === TRUE) {
        echo "<p>Message sent successfully!</p>";
    } else {
        echo "<p>Error sending message: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Feedback Form</h2>
    <form action="" method="POST">
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" required></textarea><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>

</body>
</html>

<?php $conn->close(); ?>
