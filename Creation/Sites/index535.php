<?php
// Simple Encryption and Decryption for User Communications in a Single File
// Assuming PHP and MySQL are used with mysqli extension.
// For a Gardening Tools website

// Connecting to the database
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
$sql = "CREATE TABLE IF NOT EXISTS feedbacks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    message VARCHAR(255) NOT NULL,
    encrypted_message VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    die("Error creating table: " . $conn->error);
}

// Encrypt and Decrypt functions - Simple method for demonstration using base64, not recommended for production
function simpleEncryptDecrypt($string, $action = 'encrypt'){
    $secret_key = 'my_secret_key'; // Change it to a more complex key for better security
    $output = false;

    if($action == 'encrypt') {
        $output = base64_encode($string);
    }
    else if($action == 'decrypt'){
        $output = base64_decode($string);
    }
    return $output;
}

// Handling the form submission
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["feedback"])) {
    $feedback = mysqli_real_escape_string($conn, $_POST["feedback"]);
    $encryptedFeedback = simpleEncryptDecrypt($feedback, 'encrypt');

    // Insert feedback into the database
    $sql = "INSERT INTO feedbacks (message, encrypted_message) VALUES ('$feedback', '$encryptedFeedback')";

    if ($conn->query($sql) === TRUE) {
        echo "Feedback received and encrypted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gardening Tools Feedback</title>
</head>
<body>
    <h2>Feedback Form</h2>
    <form method="POST" action="">
        <label for="feedback">Your Feedback:</label><br>
        <textarea id="feedback" name="feedback" rows="4" cols="50" required></textarea><br>
        <input type="submit" value="Submit Feedback">
    </form>
</body>
</html>

<?php
$conn->close();
?>