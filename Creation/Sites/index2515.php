<?php
// Simple example of a PHP script for a signup form with language preference selection
// for a grocery website. This script handles both the display of the signup form and
// the processing of the form data. It uses MySQL to store user data.

// Database configuration
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
$tableSql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    language VARCHAR(50),
    reg_date TIMESTAMP
)";

if (!$conn->query($tableSql)) {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $language = $_POST['language'];

    // Insert user data into database
    $insertSql = "INSERT INTO users (username, email, language) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("sss", $username, $email, $language);

    if ($stmt->execute()) {
        echo "New record created successfully";
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
    <title>Signup - Groceries Website</title>
</head>
<body>
    <h2>Signup for Our Groceries Website</h2>

    <form method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="language">Preferred Language:</label><br>
        <select name="language" id="language" required>
            <option value="English">English</option>
            <option value="Spanish">Spanish</option>
            <option value="German">German</option>
            <option value="French">French</option>
        </select><br><br>

        <input type="submit" value="Signup">
    </form>
</body>
</html>
