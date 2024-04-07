<?php

// Database configuration
$host = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exists
$initQueries = [
    "CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        description TEXT,
        category VARCHAR(100),
        price DECIMAL(10, 2),
        stock_quantity INT
    );",
    "INSERT IGNORE INTO products (id, name, description, category, price, stock_quantity) VALUES
        (1, 'Product A', 'Description of Product A', 'Category1', 19.99, 100),
        (2, 'Product B', 'Description of Product B', 'Category2', 29.99, 80),
        (3, 'Product C', 'Description of Product C', 'Category1', 39.99, 150),
        (4, 'Product D', 'Description of Product D', 'Category3', 49.99, 200),
        (5, 'Product E', 'Description of Product E', 'Category2', 59.99, 60),
        (6, 'Product F', 'Description of Product F', 'Category3', 69.99, 90);",
    "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30),
        name VARCHAR(30),
        email VARCHAR(50),
        password VARCHAR(255)
    );",
    "INSERT IGNORE INTO users (id, username, name, email, password) VALUES
        (1, 'user1', 'User One', 'user1@example.com', 'password1'),
        (2, 'user2', 'User Two', 'user2@example.com', 'password2'),
        (3, 'user3', 'User Three', 'user3@example.com', 'password3');"
];

foreach ($initQueries as $query) {
    if (!$conn->query($query)) {
        echo "Error initializing database: " . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Craft Beers and Automobiles</title>
    <style>
        body {
            background: #000;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .stellar-space {
            background-image: url('starry-background.jpg');
            background-size: cover;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        h1 {
            color: #FFD700;
        }
        .product, .user {
            border: 1px solid #FFD700;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="stellar-space">
    <div class="container">
        <h1>Craft Beers and Automobiles</h1>
Add your search form and results here
    </div>
</div>
</body>
</html>
<?php
$conn->close();
?>