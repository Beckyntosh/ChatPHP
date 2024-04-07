<?php
// This is a simplified example for educational purposes, actual deployment requires more considerations into security, validation, and efficiency.

// Database connection parameters
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

// Create tables if they do not exist
$sqlUsers = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(255) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$sqlAppointments = "CREATE TABLE IF NOT EXISTS appointments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
appointment_date DATETIME NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (user_id) REFERENCES users(id)
)";

if (!$conn->query($sqlUsers) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

if (!$conn->query($sqlAppointments) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle user sign up
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['signup'])) {
  $username = $conn->real_escape_string($_POST['username']);
  $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT); // Hash the password before storing it
  $email = $conn->real_escape_string($_POST['email']);

  $insertUser = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

  if ($conn->query($insertUser) === TRUE) {
    echo "User registered successfully!";
  } else {
    echo "Error: " . $insertUser . "<br>" . $conn->error;
  }
}

// Handle appointment booking
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['book_appointment'])) {
  $user_id = $conn->real_escape_string($_POST['user_id']);
  $appointment_date = $conn->real_escape_string($_POST['appointment_date']);

  $bookAppointment = "INSERT INTO appointments (user_id, appointment_date) VALUES ('$user_id', '$appointment_date')";

  if ($conn->query($bookAppointment) === TRUE) {
    echo "Appointment booked successfully!";
  } else {
    echo "Error: " . $bookAppointment . "<br>" . $conn->error;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sherlock Holmes Travel</title>
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
    <input type="submit" name="signup" value="Signup">
</form>

<h2>Book an Appointment</h2>
<form method="post" action="">
    <label for="user_id">User ID:</label><br>
    <input type="number" id="user_id" name="user_id" required><br>
    <label for="appointment_date">Appointment Date and Time:</label><br>
    <input type="datetime-local" id="appointment_date" name="appointment_date" required><br>
    <input type="submit" name="book_appointment" value="Book Appointment">
</form>
</body>
</html>
<?php
$conn->close();
?>