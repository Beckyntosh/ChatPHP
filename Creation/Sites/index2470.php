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
$userTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
)";

$appointmentTable = "CREATE TABLE IF NOT EXISTS appointments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    appointment_time DATETIME NOT NULL,
    CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)";

$conn->query($userTable);
$conn->query($appointmentTable);

function registerUser($username, $password, $email, $conn) {
    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $email);
    $stmt->execute();
    return $stmt->insert_id;
}

function bookAppointment($userId, $appointmentTime, $conn) {
    $stmt = $conn->prepare("INSERT INTO appointments (user_id, appointment_time) VALUES (?, ?)");
    $stmt->bind_param("is", $userId, $appointmentTime);
    $stmt->execute();
    return $stmt->insert_id;
}

// Handling form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        registerUser($username, $password, $email, $conn);
    } elseif (isset($_POST['book'])) {
        $userId = $_POST['userId'];
        $appointmentTime = $_POST['appointmentTime'];
        bookAppointment($userId, $appointmentTime, $conn);
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cyberpunk Watches Appointment System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0a0b0d;
            color: #00ff41;
            text-align: center;
        }
        .container {
            margin-top: 50px;
        }
        input, button {
            margin: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Signup</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit" name="signup">Sign Up</button>
        </form>

        <h2>Book Dental Appointment</h2>
        <form method="post">
            <input type="text" name="userId" placeholder="User ID" required>
            <input type="datetime-local" name="appointmentTime" required>
            <button type="submit" name="book">Book Appointment</button>
        </form>
    </div>
</body>
</html>
