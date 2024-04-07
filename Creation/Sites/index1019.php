<?php
// Simple example, for real-world applications use frameworks & advanced security practices

// Database connection details
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DATABASE', 'my_database');
define('MYSQL_SERVER', 'db');

// Create connection to MySQL database
$conn = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create users table if not exists
$createTableSql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
)";
if (!$conn->query($createTableSql)) {
    die("Error creating table: " . $conn->error);
}

$message = '';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    // Hash password
    $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // Prepare SQL and bind parameters
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $_POST['username'], $hashedPassword);
    
    // Execute statement
    if ($stmt->execute()) {
        $message = 'User successfully registered.';
    } else {
        $message = 'Error registering user.';
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sunglasses Website - Register</title>
</head>
<body>
    <h2>Register</h2>
    <p><?= $message; ?></p>
    <form method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Register</button>
    </form>
</body>
</html>
