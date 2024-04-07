<?php

// Simple Craft Beers Website with Secure Password Hashing

// Database configuration
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'my_database');

// Connect to database
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Create users table (if not exists)
$createUsersTableSql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";

if (!$mysqli->query($createUsersTableSql)) {
    die("Error creating table: " . $mysqli->error);
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register'])) {
        // Registration logic
        $username = $mysqli->real_escape_string($_POST['username']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $insertSql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        
        if ($mysqli->query($insertSql)) {
            echo 'User registered successfully.';
        } else {
            echo 'Error: ' . $mysqli->error;
        }
    } elseif (isset($_POST['login'])) {
        // Login logic
        $username = $mysqli->real_escape_string($_POST['username']);
        $password = $_POST['password'];

        $userSql = "SELECT * FROM users WHERE username = '$username'";
        
        $result = $mysqli->query($userSql);
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                echo 'User logged in successfully.';
            } else {
                echo 'Invalid username or password.';
            }
        } else {
            echo 'Invalid username or password.';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Craft Beers Authentication</title>
</head>
<body>
    <h2>Register</h2>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="register">Register</button>
    </form>

    <h2>Login</h2>
    <form method="post" action="">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>