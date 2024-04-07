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

// Create tables if they don't exist
$userTableSql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50)
)";

$appointmentTableSql = "CREATE TABLE IF NOT EXISTS appointments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
appointment_date DATETIME,
type VARCHAR(100),
INDEX fk_user_id (user_id),
FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($userTableSql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

if ($conn->query($appointmentTableSql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Sign up and book appointment
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // User signup
  if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

    if ($conn->query($sql) === TRUE) {
      echo "New user created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  // Booking an appointment
  if (isset($_POST['book_appointment'])) {
    $user_id = $_POST['user_id'];
    $date = $_POST['date'];
    $type = $_POST['type'];

    $sql = "INSERT INTO appointments (user_id, appointment_date, type) VALUES ('$user_id', '$date', '$type')";

    if ($conn->query($sql) === TRUE) {
      echo "New appointment booked successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Spirit's Appointment Booking</title>
</head>
<body>
<h2>Signup</h2>
<form method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    <input type="submit" name="signup" value="Signup">
</form>

<h2>Book an Appointment</h2>
<form method="post">
    <label for="user_id">User ID:</label>
    <input type="number" id="user_id" name="user_id" required><br><br>
    <label for="date">Date:</label>
    <input type="datetime-local" id="date" name="date" required><br><br>
    <label for="type">Type:</label>
    <input type="text" id="type" name="type" required><br><br>
    <input type="submit" name="book_appointment" value="Book Appointment">
</form>

</body>
</html>
