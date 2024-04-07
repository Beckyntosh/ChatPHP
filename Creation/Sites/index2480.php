<?php
// Define database connection parameters
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

// Create a users table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Create an appointments table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS appointments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid INT(6) UNSIGNED,
    appointment_date DATETIME NOT NULL,
    service VARCHAR(50) NOT NULL,
    FOREIGN KEY (userid) REFERENCES users(id),
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Close the initial connection
$conn->close();

// Handling user signup
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

// Handling appointment booking
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book_appointment'])) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    $userid = $conn->real_escape_string($_POST['userid']);
    $appointment_date = $conn->real_escape_string($_POST['appointment_date']);
    $service = $conn->real_escape_string($_POST['service']);

    $sql = "INSERT INTO appointments (userid, appointment_date, service) VALUES ('$userid', '$appointment_date', '$service')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment booked successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Jewelry Appointment System</title>
</head>
<body>

<h2>User Signup</h2>
<form method="post" action="">
    Username: <input type="text" name="username" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" name="signup" value="Signup">
</form>

<h2>Book an Appointment</h2>
<form method="post" action="">
    User ID: <input type="number" name="userid" required><br>
    Appointment Date and Time: <input type="datetime-local" name="appointment_date" required><br>
    Service: <select name="service">
        <option value="Jewelry Repair">Jewelry Repair</option>
        <option value="Custom Design">Custom Design</option>
        <option value="Ring Resizing">Ring Resizing</option>
    </select><br>
    <input type="submit" name="book_appointment" value="Book Appointment">
</form>

</body>
</html>
