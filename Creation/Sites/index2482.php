<?php
// Handle database connection
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
$usersTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

$appointmentTable = "CREATE TABLE IF NOT EXISTS appointments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userid INT(6) UNSIGNED,
datetime DATETIME NOT NULL,
service VARCHAR(50) NOT NULL,
FOREIGN KEY (userid) REFERENCES users(id)
)";

if ($conn->query($usersTable) === TRUE && $conn->query($appointmentTable) === TRUE) {
  // Tables created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle user signup
if(isset($_POST["signup_submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $email = $_POST["email"];

  $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

  if ($conn->query($sql) === TRUE) {
    echo "New user created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Handle appointment booking
if(isset($_POST["appointment_submit"])) {
  $userid = $_POST["userid"];
  $datetime = $_POST["datetime"];
  $service = $_POST["service"];

  $sql = "INSERT INTO appointments (userid, datetime, service) VALUES ('$userid', '$datetime', '$service')";

  if ($conn->query($sql) === TRUE) {
    echo "Appointment booked successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Beauty Products Appointment Booking</title>
</head>
<body>

<h2>User Signup</h2>
<form action="" method="post">
  Username: <input type="text" name="username" required><br>
  Password: <input type="password" name="password" required><br>
  Email: <input type="email" name="email" required><br>
  <input type="submit" name="signup_submit" value="Sign Up">
</form>

<h2>Book Appointment</h2>
<form action="" method="post">
  User ID: <input type="number" name="userid" required><br>
  Date and Time: <input type="datetime-local" name="datetime" required><br>
  Service: <select name="service" required>
    <option value="Dental">Dental</option>
    <option value="Beauty Treatment">Beauty Treatment</option>
    <option value="Hair Salon">Hair Salon</option>
  </select><br>
  <input type="submit" name="appointment_submit" value="Book Appointment">
</form>

</body>
</html>
