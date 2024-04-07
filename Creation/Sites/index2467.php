<?php
// DB Connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to MySQL Database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they do not exist
$usersTableSql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

$appointmentsTableSql = "CREATE TABLE IF NOT EXISTS appointments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid INT(6) UNSIGNED,
    datetime DATETIME,
    appointment_type VARCHAR(50),
    FOREIGN KEY (userid) REFERENCES users(id)
    )";

if ($conn->query($usersTableSql) === TRUE && $conn->query($appointmentsTableSql) === TRUE) {
    // Tables created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

// User Signup
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Simple hash, consider stronger

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "<p>User created successfully.</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

// Booking Appointment
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book_appointment'])) {
    $userid = $_POST['userid'];
    $datetime = $_POST['datetime'];
    $appointment_type = $_POST['appointment_type'];

    $sql = "INSERT INTO appointments (userid, datetime, appointment_type) VALUES ('$userid', '$datetime', '$appointment_type')";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Appointment booked successfully.</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Appointment Booking System</title>
</head>
<body>
User Signup Form
    <h2>User Signup</h2>
    <form method="post" action="">
        Username: <input type="text" name="username" required /><br>
        Email: <input type="email" name="email" required /><br>
        Password: <input type="password" name="password" required /><br>
        <input type="submit" name="signup" value="Sign Up"/>
    </form>

Appointment Booking Form
    <h2>Book Dental Appointment</h2>
    <form method="post" action="">
        User ID: <input type="number" name="userid" required /><br>
        Appointment Date and Time: <input type="datetime-local" name="datetime" required /><br>
        Appointment Type: <input type="text" name="appointment_type" value="Dental" readonly /><br>
        <input type="submit" name="book_appointment" value="Book Appointment"/>
    </form>
</body>
</html>

<?php
$conn->close();
?>
