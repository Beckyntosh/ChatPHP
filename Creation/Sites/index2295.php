<?php
session_start();

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

// Create table if not exists
$table = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  password VARCHAR(50),
  token VARCHAR(64),
  status TINYINT(1) DEFAULT 0,
  reg_date TIMESTAMP
)";

$conn->query($table);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = md5($conn->real_escape_string($_POST['password'])); // Simple hash, recommended to use password_hash in production
    $token = md5(rand()); // Unique token for email validation

    // Check if email already exists
    $checkEmail = "SELECT email FROM users WHERE email = '$email'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows > 0) {
        echo "Email already exists!";
    } else {
        // Insert user into database
        $sql = "INSERT INTO users (username, email, password, token) VALUES ('$username', '$email', '$password', '$token')";

        if ($conn->query($sql) === TRUE) {
            // Send verification email
            $to = $email;
            $subject = "Verify your email address";
            $message = "Please click on the link below to verify your email address: \n http://" . $_SERVER['SERVER_NAME'] . "/?token=" . $token;
            $headers = "From: no-reply@yourhaircarewebsite.com";

            if (mail($to, $subject, $message, $headers)) {
                echo "A verification email has been sent to your email address!";
            } else {
                echo "Failed to send verification email!";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

if (isset($_GET['token'])) {
    $token = $conn->real_escape_string($_GET['token']);
    $verifyToken = "UPDATE users SET status = 1 WHERE token = '$token'";

    if ($conn->query($verifyToken) === TRUE) {
        echo "Email verified successfully!";
    } else {
        echo "Invalid token!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Verification System for Hair Care Products Website</title>
</head>
<body>
    <h2>Signup Form</h2>
    <form action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" name="register" value="Register">
    </form>
</body>
</html>
