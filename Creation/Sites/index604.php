<?php

// Set up connection variables
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exists
$initScripts = [
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

// Execute initialization scripts
foreach ($initScripts as $script) {
    if (!$conn->query($script)) {
        echo "Error initializing database: " . $conn->error;
    }
}

// User verification logic
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    
    $sql = "SELECT id, username, password FROM users WHERE username = '$username'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Simple password check without hashing for demonstration purposes
        if ($password == $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            echo "Welcome " . $user['username'];
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "Invalid username or password";
    }
} else {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Login - Tablets Fashion and Lifestyle Site</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #282a36;
                color: #f8f8f2;
            }
            .login-form {
                width: 300px;
                padding: 40px;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                background-color: #6272a4;
                text-align: center;
                border-radius: 10px;
            }
            input[type="text"],
            input[type="password"] {
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                border: none;
                border-radius: 5px;
            }
            input[type="submit"] {
                width: 100%;
                padding: 10px;
                border: none;
                border-radius: 5px;
                background-color: #50fa7b;
                color: #282a36;
                cursor: pointer;
            }
            input[type="submit"]:hover {
                background-color: #64ff83;
            }
        </style>
    </head>
    <body>
        <div class="login-form">
            <form action="" method="post">
                <input type="text" name="username" placeholder="Username" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <input type="submit" value="Login">
            </form>
        </div>
    </body>
    </html>
    <?php
}

$conn->close();

?>