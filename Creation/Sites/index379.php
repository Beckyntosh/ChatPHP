<?php
// Database connection
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
$usersTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$eventsTable = "CREATE TABLE IF NOT EXISTS events (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
event_name VARCHAR(50) NOT NULL,
description TEXT,
event_date DATE,
FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($usersTable) === TRUE && $conn->query($eventsTable) === TRUE) {
  // Tables created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle User Registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $email = $_POST['email'];

  $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $username, $password, $email);

  if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Event Registration - Vitamins Webinar</title>
</head>
<body>
  <div>
    <h2>Register for Webinar</h2>
    <form action="" method="post">
      <label for="username">Username:</label><br>
      <input type="text" id="username" name="username" required><br>
      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password" required><br>
      <label for="email">Email:</label><br>
      <input type="email" id="email" name="email" required><br><br>
      <input type="submit" name="register" value="Register">
    </form> 
  </div>
</body>
</html>