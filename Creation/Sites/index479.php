<?php

// Database configuration
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

// Connect to the database
$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
);

$pdo = new PDO(
    "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE, // DSN
    MYSQL_USER, // Username
    MYSQL_PASSWORD, // Password
    $pdoOptions // Options
);

// Create Users table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$pdo->exec($sql);

// Helper function: Redirects to given path
function redirect($path) {
    header("Location: $path");
    exit();
}

// Register user
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // Insert user into the database
    $sql = "INSERT INTO users (username, password_hash) VALUES (?, ?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$username, $passwordHash]);

    // Redirect to login page
    redirect('login.php');
}

// Login user
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login_username']) && isset($_POST['login_password'])) {
    $username = $_POST['login_username'];
    $password = $_POST['login_password'];

    // Fetch user from the database
    $sql = "SELECT password_hash FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password_hash'])) {
        // Set session or cookie
        // Redirect to user's profile or dashboard
        redirect('profile.php');
    } else {
        // Handle login failure
        redirect('login.php?error=invalid_credentials');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Magazine Website - Login or Register</title>
</head>
<body>
    <div>
        <h2>Register</h2>
        <form action="index.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Register">
        </form>
    </div>

    <div>
        <h2>Login</h2>
        <form action="index.php" method="post">
            <input type="text" name="login_username" placeholder="Username" required>
            <input type="password" name="login_password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>