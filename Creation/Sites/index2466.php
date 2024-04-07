<?php
// Since the request involves deploying a complete and compilable code in a single file, the following is a simplified version of such an application including both frontend and backend parts.
// Note: In a real-world scenario, separating concerns (e.g., using MVC architecture) and not storing sensitive information in the source code are best practices.

// Connection Variables
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
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS appointments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    appointment_time DATETIME NOT NULL,
    created_at TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// User Signup
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ss", $username, $password);

    if($stmt->execute()){
        echo "User registered successfully.";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

// Booking Appointment
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['bookAppointment'])) {
    $userId = $_POST['userId'];
    $appointmentTime = $_POST['appointmentTime'];

    $sql = "INSERT INTO appointments (user_id, appointment_time) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("is", $userId, $appointmentTime);

    if($stmt->execute()){
        echo "Appointment booked successfully.";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointment Booking System</title>
</head>
<body>
    <h2>User Signup</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" name="signup" value="Sign Up">
    </form>

    <h2>Book Dental Appointment</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <label for="userId">User ID:</label>
        <input type="number" id="userId" name="userId" required>
        <label for="appointmentTime">Appointment Time:</label>
        <input type="datetime-local" id="appointmentTime" name="appointmentTime" required>
        <input type="submit" name="bookAppointment" value="Book Appointment">
    </form>
</body>
</html>
