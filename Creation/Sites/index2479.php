<?php
// Include database configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle user registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Check if user already exists
  $checkUser = "SELECT email FROM users WHERE email='$email'";
  $result = $conn->query($checkUser);

  if ($result->num_rows > 0) {
    echo "User already exists!";
  } else {
    // Insert new user
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
      echo "New user created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}

// Handle appointment booking
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book_appointment'])) {
  $user_email = $_POST['user_email'];
  $appointment_date = $_POST['appointment_date'];

  // Insert appointment
  $sql = "INSERT INTO appointments (user_email, appointment_date) VALUES ('$user_email', '$appointment_date')";

  if ($conn->query($sql) === TRUE) {
    echo "Appointment booked successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Travel Appointments</title>
</head>
<body>
  <h2>User Registration</h2>
  <form method="post">
    <input type="text" name="name" placeholder="Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit" name="register">Register</button>
  </form>

  <h2>Book Appointment</h2>
  <form method="post">
    <input type="email" name="user_email" placeholder="Your Email" required><br>
    <input type="date" name="appointment_date" required><br>
    <button type="submit" name="book_appointment">Book Appointment</button>
  </form>
</body>
</html>
