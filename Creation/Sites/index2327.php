<?php
// Connection variables
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

// Create tables if they don't exist

// Users table
$usersTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(32) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($usersTable) === TRUE) {
  echo "Table users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Events table
$eventsTable = "CREATE TABLE IF NOT EXISTS events (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
event_name VARCHAR(50) NOT NULL,
description TEXT NOT NULL,
event_date DATE NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($eventsTable) === TRUE) {
  echo "Table events created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect values from the form
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = md5($_POST['password']); // Encrypting password for security

  // Insert user into the database
  $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

  if ($conn->query($sql) === TRUE) {
    echo "New account created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

HTML form for creating a new account
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; padding: 20px;}
        form { background-color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); }
        input[type="text"], input[type="email"], input[type="password"], button { padding: 10px; margin: 10px 0; width: 100%; box-sizing:border-box; }
        button { background-color: #007bff; color: #fff; border: none; cursor: pointer;}
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <form action="" method="post">
        <h2>Create Account</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Create Account</button>
    </form>
</body>
</html>
