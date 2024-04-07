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

// Create tables if not exists
$sql_users = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP
)";

$sql_appointments = "CREATE TABLE IF NOT EXISTS appointments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
user_id INT(6) UNSIGNED,
appointment_time DATETIME,
details TEXT,
FOREIGN KEY (user_id) REFERENCES users(id)
)";

$conn->query($sql_users);
$conn->query($sql_appointments);

// User Signup
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();
    echo "<p>Signup successful. You can now book an appointment.</p>";
}

// Book Appointment
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book_appointment'])) {
    $user_id = $_POST['user_id'];
    $appointment_time = $_POST['appointment_time'];
    $details = $_POST['details'];
  
    $sql = "INSERT INTO appointments (user_id, appointment_time, details) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $user_id, $appointment_time, $details);
    $stmt->execute();
    echo "<p>Appointment booked successfully.</p>";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<h2>User Signup</h2>
<form method="post">
  Username:<br>
  <input type="text" name="username" required>
  <br>
  Email:<br>
  <input type="email" name="email" required>
  <br>
  Password:<br>
  <input type="password" name="password" required>
  <br><br>
  <input type="submit" name="signup" value="Signup">
</form>

<h2>Book Appointment</h2>
<form method="post">
  User ID:<br>
  <input type="number" name="user_id" required>
  <br>
  Appointment Time:<br>
  <input type="datetime-local" name="appointment_time" required>
  <br>
  Details:<br>
  <textarea name="details" required></textarea>
  <br>
  <input type="submit" name="book_appointment" value="Book Appointment">
</form>

</body>
</html>
