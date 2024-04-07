<?php
// Database connection
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
$createUsersTable = "CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(32) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$createAppointmentsTable = "CREATE TABLE IF NOT EXISTS Appointments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
date DATE NOT NULL,
time TIME NOT NULL,
type VARCHAR(50),
FOREIGN KEY (user_id) REFERENCES Users(id)
)";

$conn->query($createUsersTable);
$conn->query($createAppointmentsTable);

// Handle User Signup
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = md5($conn->real_escape_string($_POST['password'])); // Simple encryption

    $insertUser = "INSERT INTO Users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($insertUser) === TRUE) {
        echo "New user created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle Appointment Booking
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["bookAppointment"])) {
    $userId = $conn->real_escape_string($_POST['userId']);
    $date = $conn->real_escape_string($_POST['date']);
    $time = $conn->real_escape_string($_POST['time']);
    $type = $conn->real_escape_string($_POST['type']);

    $bookAppointment = "INSERT INTO Appointments (user_id, date, time, type) VALUES ('$userId', '$date', '$time', '$type')";
    if ($conn->query($bookAppointment) === TRUE) {
        echo "New appointment booked successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bath Products - Dental Appointment</title>
</head>
<body>
    <h2>User Signup</h2>
    <form method="post" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" name="signup" value="Signup">
    </form>
    <h2>Book Dental Appointment</h2>
    <form method="post" action="">
        <label for="userId">User ID:</label><br>
        <input type="number" id="userId" name="userId" required><br>
        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" required><br>
        <label for="time">Time:</label><br>
        <input type="time" id="time" name="time" required><br>
        <label for="type">Appointment Type:</label><br>
        <select id="type" name="type">
            <option value="Dental Checkup">Dental Checkup</option>
            <option value="Cavity Filling">Cavity Filling</option>
            <option value="Tooth Extraction">Tooth Extraction</option>
            <option value="Teeth Whitening">Teeth Whitening</option>
        </select><br>
        <input type="submit" name="bookAppointment" value="Book Appointment">
    </form>
</body>
</html>
<?php
$conn->close();
?>
