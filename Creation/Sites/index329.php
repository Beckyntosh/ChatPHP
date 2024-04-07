<?php
// Connect to the database
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

// Create table for user data if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50),
    facebook_id VARCHAR(255),
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handling the Facebook login/link request
if (isset($_POST['facebook_id']) && isset($_POST['email'])) {
    $email = $_POST['email'];
    $facebook_id = $_POST['facebook_id'];

    // Check if user already exists with the same email
    $sql = "SELECT id FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, update their Facebook ID
        $sql = "UPDATE users SET facebook_id='$facebook_id' WHERE email='$email'";
        if ($conn->query($sql) === TRUE) {
            echo "Account linked successfully.";
        } else {
            echo "Error linking account: " . $conn->error;
        }
    } else {
        // No user exists, create new
        $sql = "INSERT INTO users (email, facebook_id) VALUES ('$email', '$facebook_id')";
        if ($conn->query($sql) === TRUE) {
            echo "Account created and linked successfully.";
        } else {
            echo "Error creating account: " . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Spirits Website - Link your Facebook</title>
</head>
<body>

<h2>Link your Facebook account for quick login</h2>

<form action="" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    <label for="facebook_id">Facebook ID:</label>
    <input type="text" id="facebook_id" name="facebook_id" required><br><br>
    <input type="submit" value="Link Facebook">
</form>

</body>
</html>