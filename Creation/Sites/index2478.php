<?php
// Set database connection
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

// Create USER and APPOINTMENT tables if they don't exist
$sqlUserTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
)";

$sqlAppointmentTable = "CREATE TABLE IF NOT EXISTS appointments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    appointment_date DATETIME NOT NULL,
    service VARCHAR(100) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

$conn->query($sqlUserTable);
$conn->query($sqlAppointmentTable);

// Signup functionality
if (isset($_POST['signup'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, password_hash($_POST['password'], PASSWORD_DEFAULT));
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Booking functionality
if (isset($_POST['book'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $appointment_date = mysqli_real_escape_string($conn, $_POST['appointment_date']);
    $service = mysqli_real_escape_string($conn, $_POST['service']);

    $sql = "INSERT INTO appointments (user_id, appointment_date, service) VALUES ('$user_id', '$appointment_date', '$service')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment booked successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sherlock Holmes Skin Care</title>
</head>
<body style="background-color: #f0e6d6; font-family: 'Courier New', Courier, monospace; color: #333;">
    <h1 style="text-align: center;">Signup for an appointment</h1>
    <form action="" method="post" style="text-align: center;">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="submit" name="signup" value="Sign Up">
    </form>
    <h2 style="text-align: center;">Book your appointment</h2>
    <form action="" method="post" style="text-align: center;">
        <input type="text" name="user_id" placeholder="User ID" required>
        <input type="datetime-local" name="appointment_date" required>
        <select name="service">
            <option value="Skin Care Consultation">Skin Care Consultation</option>
            <option value="Acne Treatment Session">Acne Treatment Session</option>
Add more services as needed
        </select>
        <input type="submit" name="book" value="Book Appointment">
    </form>
</body>
</html>

<?php
$conn->close();
?>
