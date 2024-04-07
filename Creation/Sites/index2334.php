<?php

$host = 'db';
$user = 'root';
$password = 'root';
$dbName = 'my_database';

// Create connection
$conn = new mysqli($host, $user, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exist
$usersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(32) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
)";

$eventsTable = "CREATE TABLE IF NOT EXISTS events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userId INT(6) UNSIGNED,
    eventName VARCHAR(100) NOT NULL,
    eventDate DATE NOT NULL,
    FOREIGN KEY (userId) REFERENCES users(id)
)";

$conn->query($usersTable);
$conn->query($eventsTable);

$message = '';

// Handle user registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];

    $insertUser = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

    if ($conn->query($insertUser) === TRUE) {
        $message = "User registered successfully!";
    } else {
        $message = "Error: " . $insertUser . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration</title>
</head>
<body>
    <h2>User Registration</h2>
    <p><?php echo $message; ?></p>
    <form method="post" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <input type="submit" name="register" value="Register">
    </form>
</body>
</html>
