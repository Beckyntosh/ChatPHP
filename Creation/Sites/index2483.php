<?php
session_start();

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

// User Signup
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Booking Appointment
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book'])) {
    $user_id = $_POST['user_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $destination = $_POST['destination'];

    $sql = "INSERT INTO appointments (user_id, date, time, destination) VALUES ('$user_id', '$date', '$time', '$destination')";

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
    <title>Travel Appointment Booking</title>
</head>
<body>

<h2>Signup</h2>
<form method="post">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="email" name="email"><br><br>
    Password: <input type="password" name="password"><br><br>
    <input type="submit" name="signup" value="Signup">
</form>

<h2>Book an Appointment</h2>
<form method="post">
    User ID: <input type="text" name="user_id"><br><br>
    Date: <input type="date" name="date"><br><br>
    Time: <input type="time" name="time"><br><br>
    Destination: <input type="text" name="destination"><br><br>
    <input type="submit" name="book" value="Book Appointment">
</form>

</body>
</html>
