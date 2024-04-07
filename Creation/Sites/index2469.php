<?php
// Connection & session start
session_start();
$servername = "db";
$database = "my_database";
$username = "root";
$password = "root";
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exists
$usersTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";

$appointmentTable = "CREATE TABLE IF NOT EXISTS appointments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userid INT(6) UNSIGNED,
appointment_date DATETIME NOT NULL,
FOREIGN KEY (userid) REFERENCES users(id)
)";

$conn->query($usersTable);
$conn->query($appointmentTable);

// Signup
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $signupsql = "INSERT INTO users (username, password) VALUES ('$username', '$passwordHash')";
  
    if ($conn->query($signupsql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $signupsql . "<br>" . $conn->error;
    }
}

// Appointment Booking
if (isset($_POST['book'])) {
    $userid = $_SESSION['userid'];
    $appointment_date = $_POST['appointment_date'];
    
    $booksql = "INSERT INTO appointments (userid, appointment_date) VALUES ('$userid', '$appointment_date')";
  
    if ($conn->query($booksql) === TRUE) {
        echo "Appointment booked successfully";
    } else {
        echo "Error: " . $booksql . "<br>" . $conn->error;
    }
}

// Login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $loginsql = "SELECT id, password FROM users WHERE username='$username'";
    $result = $conn->query($loginsql);
  
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['userid'] = $row['id'];
            echo "Login successful";
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "No user found";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Vinyl Records - Booking System</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            background: #f2f2f2;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Romeo and Juliet Vinyl Records</h2>
    <form method="post">
        <h3>Signup</h3>
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" name="signup" value="Sign Up">
    </form>
    <form method="post">
        <h3>Login</h3>
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" name="login" value="Login">
    </form>
    <form method="post">
        <h3>Book an Appointment</h3>
        Appointment Date: <input type="datetime-local" name="appointment_date" required><br>
        <input type="submit" name="book" value="Book Appointment">
    </form>
</div>
</body>
</html>
<?php $conn->close(); ?>
