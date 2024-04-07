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

// SQL to create table for users if it doesn't exist
$sqlUsers = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(32) NOT NULL,
reg_date TIMESTAMP
)";

// SQL to create table for events if it doesn't exist
$sqlEvents = "CREATE TABLE IF NOT EXISTS events (
event_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
event_name VARCHAR(50) NOT NULL,
description TEXT NOT NULL,
event_date DATE NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sqlUsers) === TRUE && $conn->query($sqlEvents) === TRUE) {
    // Tables created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Simple hash for password, consider stronger options

    $sqlInsert = "INSERT INTO users (username, email, password)
    VALUES ('$username', '$email', '$password')";

    if ($conn->query($sqlInsert) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sqlInsert . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Event Registration - Sign Up</title>
</head>
<body>
    <style>
        body { font-family: 'Courier New', monospace; }
        form { margin-top: 50px; }
        input[type=text], input[type=password], input[type=email] { margin-bottom: 10px; }
    </style>
    <h2>Sign Up to Register for an Event</h2>
    <form method="post" action="">
        Username: <input type="text" name="username" required><br>
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
