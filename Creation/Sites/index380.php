<?php
// Define MySQL connection data
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

// Create user and events tables if not exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(60) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    eventName VARCHAR(30) NOT NULL,
    eventDate DATE NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle POST requests for user registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashed_password, $email);

    // set parameters and execute
    $username = $_POST['username'];
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $stmt->execute();
    echo "New record created successfully";

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: Arial, sans-serif; }
        form { display: flex; flex-direction: column; width: 300px; margin: auto; }
        input, button { margin: 10px 0; }
    </style>
    <title>User Registration for Event</title>
</head>
<body>
    <h2>Register for an Event</h2>

    <form method="POST">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <button type="submit">Register</button>
    </form>
</body>
</html>