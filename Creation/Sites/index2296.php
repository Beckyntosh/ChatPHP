<?php
// Define database connection parameters
define('DB_HOST', 'db');
define('DB_NAME', 'my_database');
define('DB_USER', 'root');
define('DB_PASS', 'root');

// Connect to the database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Create table `users` if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(60),
    verification_code VARCHAR(50),
    is_verified BOOLEAN DEFAULT 0,
    reg_date TIMESTAMP
)";
$conn->query($sql);

// Process signup
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
    $verification_code = md5(rand());

    // Check if email already exists
    $checkEmail = $conn->query("SELECT email FROM users WHERE email='$email'");
    if ($checkEmail->num_rows > 0) {
        echo 'Email already exists!';
    } else {
        // Insert user into the database
        $sql = "INSERT INTO users (username, email, password, verification_code) VALUES ('$username', '$email', '$password', '$verification_code')";
        
        if ($conn->query($sql) === TRUE) {
            // TODO: Send verification email here
            echo "Signup successful. Please check your email to verify.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup - Art Supplies</title>
</head>
<body>
    <h2>Signup</h2>
    <form method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" name="signup" value="Signup">
    </form>
</body>
</html>
