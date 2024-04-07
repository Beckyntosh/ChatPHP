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

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS events (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
eventName VARCHAR(50) NOT NULL,
description TEXT,
eventDate DATE,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted for user registration, insert form data into users table.
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = md5($_POST["password"]); // MD5 for simplicity, not suitable for production

  $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully. Please log in.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Event Registration Platform</title>
<style>
    body { font-family: Arial, sans-serif; background-color: #f0f0f0; }
    .container { width: 50%; margin: 20px auto; padding: 20px; background-color: #fff; box-shadow: 0 0 10px 0 rgba(0,0,0,0.1); }
    input[type=text], input[type=password], input[type=email] { width: 100%; padding: 10px; margin: 5px 0 20px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; }
    button { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%; }
    button:hover { opacity: 0.8; }
</style>
</head>
<body>
<div class="container">
<h2>Signup Form</h2>
<form action="" method="POST">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <button type="submit" name="register">Register</button>
</form>
</div>
</body>
</html>
