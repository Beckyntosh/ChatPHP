<?php
// Simple one-file appointment booking system with user signup.

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
$createUsersTable = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  password VARCHAR(64) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP
)";

$createAppointmentsTable = "CREATE TABLE IF NOT EXISTS appointments (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(6) UNSIGNED,
  appointment_datetime DATETIME NOT NULL,
  appointment_type VARCHAR(50),
  FOREIGN KEY (user_id) REFERENCES users(id)
)";

$conn->query($createUsersTable);
$conn->query($createAppointmentsTable);

// User Signup
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Password hashing
  $email = $_POST['email'];

  $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

  if ($conn->query($sql) === TRUE) {
    echo "New user created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Appointment Booking
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book_appointment'])) {
  $user_id = $_POST['user_id'];
  $appointment_datetime = $_POST['appointment_datetime'];
  $appointment_type = $_POST['appointment_type'];

  $sql = "INSERT INTO appointments (user_id, appointment_datetime, appointment_type) VALUES ('$user_id', '$appointment_datetime', '$appointment_type')";

  if ($conn->query($sql) === TRUE) {
    echo "Appointment booked successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Appointment Booking System</title>
</head>
<body>

<h2>User Signup</h2>

<form method="post">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" required><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" required><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br><br>
  <input type="submit" name="signup" value="Signup">
</form>

<h2>Book Appointment</h2>

<form method="post">
  <label for="user_id">User ID:</label><br>
  <input type="number" id="user_id" name="user_id" required><br>
  <label for="appointment_datetime">Appointment Date and Time:</label><br>
  <input type="datetime-local" id="appointment_datetime" name="appointment_datetime" required><br>
  <label for="appointment_type">Appointment Type:</label><br>
  <input type="text" id="appointment_type" name="appointment_type" required><br><br>
  <input type="submit" name="book_appointment" value="Book Appointment">
</form>

</body>
</html>
