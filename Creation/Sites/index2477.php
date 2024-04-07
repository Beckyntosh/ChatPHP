<?php
// Define variables for database connection
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
$sqlUsersTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$sqlAppointmentsTable = "CREATE TABLE IF NOT EXISTS appointments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
appointment_date DATETIME NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sqlUsersTable) === TRUE && $conn->query($sqlAppointmentsTable) === TRUE) {
  // Tables created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle user signup
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sqlInsertUser = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$password')";

    if ($conn->query($sqlInsertUser) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle appointment booking
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["book_appointment"])) {
    $userId = $_POST['user_id'];  // Assuming user_id is fetched from session after login
    $appointmentDate = $_POST['appointment_date'];

    $sqlBookAppointment = "INSERT INTO appointments (user_id, appointment_date) VALUES ('$userId', '$appointmentDate')";

    if ($conn->query($sqlBookAppointment) === TRUE) {
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
    <title>Vinyl Records - Appointment Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: peachpuff;
            color: darkred;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type=text], input[type=password], input[type=email], input[type=datetime-local] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: darkred;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #B22222;
        }
    </style>
</head>
<body>

<div class="container">
<h2>Signup for Vinyl Records Appointment</h2>
<form action="" method="post">
    <label for="fullname">Full Name:</label>
    <input type="text" id="fullname" name="fullname" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    
    <input type="submit" name="signup" value="Signup">
</form>
</div>

<div class="container">
<h2>Book a Dental Appointment</h2>
<form action="" method="post">
    <label for="user_id">User ID:</label>
    <input type="text" id="user_id" name="user_id" required>
    
    <label for="appointment_date">Appointment Date and Time:</label>
    <input type="datetime-local" id="appointment_date" name="appointment_date" required>

    <input type="submit" name="book_appointment" value="Book Appointment">
</form>
</div>

</body>
</html>
