<?php

// Create connection
$conn = new mysqli('db', 'root', 'root', 'my_database');

// Check connection
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// Creat tables if they don't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE){
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    appointment_date TIMESTAMP NOT NULL,
    type VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

if (!$conn->query($sql) === TRUE){
    echo "Error creating table: " . $conn->error;
}

// Handle form submissions
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["signup"])) {
        $username = $conn->real_escape_string($_POST['username']);
        $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
        $email = $conn->real_escape_string($_POST['email']);
        
        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<p>Signup Successfull. Please log in to book an appointment.</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    } elseif (isset($_POST["book"])) {
        $userId = $conn->real_escape_string($_POST['userId']);
        $date = $conn->real_escape_string($_POST['date']);
        $type = $conn->real_escape_string($_POST['appointmentType']);
        
        $sql = "INSERT INTO appointments (user_id, appointment_date, type) VALUES ('$userId', '$date', '$type')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<p>Appointment booked successfully!</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Video Games Website - Appointment Booking</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; color: #333; }
        .container { max-width: 600px; margin: auto; background: #ffffff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="password"], input[type="email"], input[type="datetime-local"], select { width: 100%; padding: 10px; margin-top: 5px; }
        button { cursor: pointer; background-color: #007bff; color: white; border: none; padding: 10px 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sign Up</h1>
        <form method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email">
            </div>
            <button type="submit" name="signup">Sign Up</button>
        </form>
    </div>
    <div class="container">
        <h1>Book an Appointment</h1>
        <form method="POST">
            <div class="form-group">
                <label for="userId">User ID</label>
                <input type="text" id="userId" name="userId">
            </div>
            <div class="form-group">
                <label for="date">Appointment Date</label>
                <input type="datetime-local" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="appointmentType">Type of Appointment</label>
                <select id="appointmentType" name="appointmentType">
                    <option value="Dental">Dental</option>
                    <option value="Orthodontic">Orthodontic</option>
                    <option value="Cleaning">Cleaning</option>
                </select>
            </div>
            <button type="submit" name="book">Book Appointment</button>
        </form>
    </div>
</body>
</html>