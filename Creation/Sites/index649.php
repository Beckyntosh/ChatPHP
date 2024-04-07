<?php
// Define database connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize the database with tables if they don't exist
$initSql = [
    "CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        description TEXT,
        category VARCHAR(100),
        price DECIMAL(10, 2),
        stock_quantity INT
     );",
    "INSERT INTO products (name, description, category, price, stock_quantity) VALUES
        ('Product A', 'Description of Product A', 'Category1', 19.99, 100),
        ('Product B', 'Description of Product B', 'Category2', 29.99, 80),
        ('Product C', 'Description of Product C', 'Category1', 39.99, 150),
        ('Product D', 'Description of Product D', 'Category3', 49.99, 200),
        ('Product E', 'Description of Product E', 'Category2', 59.99, 60),
        ('Product F', 'Description of Product F', 'Category3', 69.99, 90);",
    "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30),
        name VARCHAR(30),
        email VARCHAR(50),
        password VARCHAR(255)
     );",
    "INSERT INTO users (username, name, email, password) VALUES
        ('user1', 'User One', 'user1@example.com', 'password1'),
        ('user2', 'User Two', 'user2@example.com', 'password2'),
        ('user3', 'User Three', 'user3@example.com', 'password3');"
];

foreach ($initSql as $sql) {
    if (!$conn->query($sql)) {
        echo "Error: " . $conn->error;
    }
}

// Admin functionality (very basic example, perform security checks in a real application)
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Extremely basic and insecure authentication for demonstration purposes only. Secure your applications!
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $username;
        echo "<p>Login successful. Welcome, $username!</p>";
    } else {
        echo "<p>Invalid username or password.</p>";
    }
}

if (isset($_SESSION['admin'])) {
    echo "<p>Welcome, " . $_SESSION['admin'] . ". You have admin access.</p>";
    // Admin can perform actions here such as managing products or users
}

// Basic logout functionality
if (isset($_POST['logout'])) {
    unset($_SESSION['admin']);
    session_destroy();
    echo "<p>Logged out successfully.</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Groceries Digital Marketing Services Site - Admin Panel</title>
    <style>
        body {font-family: "Trebuchet MS", sans-serif; background-color: #f0f0f0; color: #333; padding: 20px;}
        .admin-form {background-color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
        input[type=text], input[type=password] {width: 100%; padding: 10px; margin: 10px 0; border-radius: 5px; border: 1px solid #ccc;}
        input[type=submit] {background-color: #555; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;}
        input[type=submit]:hover {background-color: #333;}
    </style>
</head>
<body>
    <h2>Groceries Digital Marketing Services Site - Admin Access</h2>
    <div class="admin-form">
        <?php if (!isset($_SESSION['admin'])): ?>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <input type="submit" value="Login">
        </form>
        <?php endif; ?>
        <?php if (isset($_SESSION['admin'])): ?>
        <form action="" method="post">
            <input type="submit" name="logout" value="Logout">
        </form>
        <?php endif; ?>
    </div>
</body>
</html>