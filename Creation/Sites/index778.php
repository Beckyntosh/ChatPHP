<?php
// Initialize connection variables
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

// Create products table
$productsTableSql = "CREATE TABLE IF NOT EXISTS products (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
description TEXT,
category VARCHAR(100),
price DECIMAL(10, 2),
stock_quantity INT
)";

if (!$conn->query($productsTableSql)) {
    echo "Error creating table: " . $conn->error;
}

// Create users table
$usersTableSql = "CREATE TABLE IF NOT EXISTS users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30),
name VARCHAR(30),
email VARCHAR(50),
password VARCHAR(255)
)";

if (!$conn->query($usersTableSql)) {
    echo "Error creating table: " . $conn->error;
}

// Check for the insertion of the initial data
$checkProductsSql = "SELECT COUNT(*) AS total FROM products";
$result = $conn->query($checkProductsSql);
$row = $result->fetch_assoc();
if ($row['total'] == 0) {
    // Insert into products
    $insertProductsSql = "INSERT INTO products (name, description, category, price, stock_quantity) VALUES
    ('Product A', 'Description of Product A', 'Category1', 19.99, 100),
    ('Product B', 'Description of Product B', 'Category2', 29.99, 80),
    ('Product C', 'Description of Product C', 'Category1', 39.99, 150),
    ('Product D', 'Description of Product D', 'Category3', 49.99, 200),
    ('Product E', 'Description of Product E', 'Category2', 59.99, 60),
    ('Product F', 'Description of Product F', 'Category3', 69.99, 90)";

    if (!$conn->query($insertProductsSql)) {
        echo "Error inserting data into products table: " . $conn->error;
    }
}

// Check for the insertion of the initial data in users table
$checkUsersSql = "SELECT COUNT(*) AS total FROM users";
$result = $conn->query($checkUsersSql);
$row = $result->fetch_assoc();
if ($row['total'] == 0) {
    // Insert into users
    $insertUsersSql = "INSERT INTO users (username, name, email, password) VALUES
    ('user1', 'User One', 'user1@example.com', 'password1'),
    ('user2', 'User Two', 'user2@example.com', 'password2'),
    ('user3', 'User Three', 'user3@example.com', 'password3')";

    if (!$conn->query($insertUsersSql)) {
        echo "Error inserting data into users table: " . $conn->error;
    }
}

echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Vintage Vogue Hair Care Quiz</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #333;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #0779e4 3px solid;
        }
        header h1 {
            text-align: center;
            text-transform: uppercase;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <header>
        <div class='container'>
            <h1>Vintage Vogue Hair Care Products Quiz</h1>
        </div>
    </header>
    <div class='container'>
        <p>Welcome to our interactive quiz! Explore our vintage vogue themed hair care products and find the best match for you.</p>
    </div>
</body>
</html>";

$conn->close();
?>