<?php
// Note: For security reasons, storing the database password in the code like this is not recommended for a real-world application.
define('MYSQL_ROOT_PSWD', 'root');
define('MYSQL_DB', 'my_database');
define('DB_SERVER', 'db');

$pdo = new PDO('mysql:host='.DB_SERVER.';dbname='.MYSQL_DB, 'root', MYSQL_ROOT_PSWD);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Create tables if not exist
$queries = [];

$queries[] = "CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE
)";

$queries[] = "CREATE TABLE IF NOT EXISTS appointments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  appointment_date DATETIME NOT NULL,
  description VARCHAR(255),
  FOREIGN KEY (user_id) REFERENCES users(id)
)";

foreach ($queries as $query) {
    $pdo->exec($query);
}

// Handling Signup & Appointment Booking
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['signup'])) {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $email = $_POST['email'];

        $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $password, $email]);
        
        echo "User created successfully!";
    } else if (!empty($_POST['book_appointment'])) {
        $user_id = $_POST['user_id'];
        $appointment_date = $_POST['appointment_date'];
        $description = $_POST['description'];

        $sql = "INSERT INTO appointments (user_id, appointment_date, description) VALUES (?, ?, ?)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id, $appointment_date, $description]);
        
        echo "Appointment booked successfully!";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Wines Appointment Booking</title>
</head>
<body>
    <h2>User Signup</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="submit" name="signup" value="Sign Up">
    </form>

    <h2>Book Dental Appointment</h2>
    <form method="post">
        <input type="number" name="user_id" placeholder="Your User ID" required>
        <input type="datetime-local" name="appointment_date" required>
        <input type="text" name="description" placeholder="Appointment Description">
        <input type="submit" name="book_appointment" value="Book Appointment">
    </form>
</body>
</html>
