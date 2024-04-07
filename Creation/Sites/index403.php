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

// Create tables if they don't exist
$userTableCreationQuery = "
CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  password VARCHAR(60) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP
)";

$appointmentTableCreationQuery = "
CREATE TABLE IF NOT EXISTS appointments (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(6) UNSIGNED,
  appointment_date DATETIME NOT NULL,
  appointment_type VARCHAR(50) NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id)
)";

$conn->query($userTableCreationQuery);
$conn->query($appointmentTableCreationQuery);

// Handling user signup
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
  $username = $conn->real_escape_string($_POST['username']);
  $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
  $email = $conn->real_escape_string($_POST['email']);

  $signupQuery = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

  if ($conn->query($signupQuery) === TRUE) {
    echo "New user created successfully";
  } else {
    echo "Error: " . $signupQuery . "<br>" . $conn->error;
  }
}

// Handling appointment booking
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_appointment'])) {
  $userId = $conn->real_escape_string($_POST['user_id']);
  $appointmentDate = $conn->real_escape_string($_POST['appointment_date']);
  $appointmentType = $conn->real_escape_string($_POST['appointment_type']);

  $bookingQuery = "INSERT INTO appointments (user_id, appointment_date, appointment_type) VALUES ('$userId', '$appointmentDate', '$appointmentType')";

  if ($conn->query($bookingQuery) === TRUE) {
    echo "Appointment booked successfully";
  } else {
    echo "Error: " . $bookingQuery . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gardening Tools Appointment System</title>
</head>
<body>
    <h2>User Signup</h2>
    <form method="post" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <input type="submit" name="signup" value="Sign Up">
    </form>

    <h2>Book an Appointment</h2>
    <form method="post" action="">
        <label for="user_id">User ID:</label><br>
        <input type="number" id="user_id" name="user_id" required><br>
        <label for="appointment_date">Appointment Date:</label><br>
        <input type="datetime-local" id="appointment_date" name="appointment_date" required><br>
        <label for="appointment_type">Appointment Type:</label><br>
        <select id="appointment_type" name="appointment_type" required>
            <option value="Garden Consultation">Garden Consultation</option>
            <option value="Tool Maintenance">Tool Maintenance</option>
        </select><br>
        <input type="submit" name="book_appointment" value="Book Appointment">
    </form>
</body>
</html>