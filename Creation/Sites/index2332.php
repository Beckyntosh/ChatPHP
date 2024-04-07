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
$sqlUsers = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP
)";

$sqlEvents = "CREATE TABLE IF NOT EXISTS events (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(50) NOT NULL,
description TEXT,
event_date DATE,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sqlUsers) !== TRUE || $conn->query($sqlEvents) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Makeup Event Registration</title>
<style>
body {font-family: Arial, sans-serif;}
</style>
</head>
<body>

<h2>Signup for Makeup Events</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" value=""><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" value=""><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" value=""><br><br>
  <input type="submit" name="signup" value="Signup">
</form> 

</body>
</html>
