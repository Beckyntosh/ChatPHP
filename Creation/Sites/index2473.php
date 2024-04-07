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

// Create Tables if not exists
$users_table = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

$appointments_table = "CREATE TABLE IF NOT EXISTS appointments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
appointment_date DATETIME NOT NULL,
appointment_type VARCHAR(50) NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id)
)";

$conn->query($users_table);
$conn->query($appointments_table);

// Signup process
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt password
    $email = $_POST['email'];

    $signup_sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

    if ($conn->query($signup_sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $signup_sql . "<br>" . $conn->error;
    }
}

// Appointment booking
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book_appointment'])) {
    $user_id = $_POST['user_id'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_type = $_POST['appointment_type'];

    $booking_sql = "INSERT INTO appointments (user_id, appointment_date, appointment_type) VALUES ('$user_id', '$appointment_date', '$appointment_type')";

    if ($conn->query($booking_sql) === TRUE) {
        echo "Appointment booked successfully";
    } else {
        echo "Error: " . $booking_sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Board Games Appointment Booking System</title>
</head>
<body>
User Signup Form
    <h2>User Signup</h2>
    <form method="post" action="">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        Email: <input type="email" name="email"><br>
        <input type="submit" name="signup" value="Signup">
    </form>

Appointment Booking Form
    <h2>Book a Dental Appointment</h2>
    <form method="post" action="">
        User ID: <input type="number" name="user_id" required><br>
        Appointment Date: <input type="datetime-local" name="appointment_date" required><br>
        Appointment Type: <select name="appointment_type">
            <option value="Dental Checkup">Dental Checkup</option>
            <option value="Dental Cleaning">Dental Cleaning</option>
            <option value="Tooth Extraction">Tooth Extraction</option>
        </select><br>
        <input type="submit" name="book_appointment" value="Book Appointment">
    </form>
</body>
</html>

<?php
$conn->close();
?>
