<?php
// Set up database connection
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

// Create users table if it doesn't exist
$userTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(50) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";
$conn->query($userTable);

// Create appointments table if it doesn't exist
$appTable = "CREATE TABLE IF NOT EXISTS appointments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userId INT(6) UNSIGNED,
appointmentDate DATETIME NOT NULL,
FOREIGN KEY (userId) REFERENCES users(id)
)";
$conn->query($appTable);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle user sign-up
    if (isset($_POST['signup'])) {
        $username = $conn->real_escape_string($_POST['username']);
        $email = $conn->real_escape_string($_POST['email']);
        $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_BCRYPT);
        $insertUser = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

        if ($conn->query($insertUser) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $insertUser . "<br>" . $conn->error;
        }
    }

    // Handle appointment booking
    if (isset($_POST['book'])) {
        $userId = $conn->real_escape_string($_POST['userId']);
        $appointmentDate = $conn->real_escape_string($_POST['appointmentDate']);
        $bookAppointment = "INSERT INTO appointments (userId, appointmentDate) VALUES ('$userId', '$appointmentDate')";

        if ($conn->query($bookAppointment) === TRUE) {
            echo "Appointment booked successfully";
        } else {
            echo "Error: " . $bookAppointment . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vitamins Website - Appointment Booking</title>
</head>
<body>
    <h2>User Signup</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Username: <input type="text" name="username" required><br>
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" name="signup" value="Sign Up">
    </form>
    
    <h2>Book a Dental Appointment</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        User ID: <input type="number" name="userId" required><br>
        Appointment Date: <input type="datetime-local" name="appointmentDate" required><br>
        <input type="submit" name="book" value="Book Appointment">
    </form>
</body>
</html>
