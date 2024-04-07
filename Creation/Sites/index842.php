<?php
// MySQL database connection credentials
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

// Check if the products and users tables exist and create them if they don't
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
        echo "Error creating tables or inserting data: " . $conn->error . "<br>";
    }
}

// Simple form for category searching
echo "<!DOCTYPE html>
<html>
<head>
    <title>Bedding Online Magazine</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #e1f5fe; }
        .container { width: 80%; margin: auto; background-color: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        form { margin-bottom: 20px; }
        input[type=text], select { padding: 10px; margin: 10px 0; width: 200px; }
        input[type=submit] { padding: 10px; background-color: #2196f3; color: white; border: none; cursor: pointer; }
        .product { margin-bottom: 20px; padding: 10px; border: 1px solid #b3e5fc; background-color: #e3f2fd; }
        h2 { color: #0277bd; }
    </style>
</head>
<body>
<div class='container'>
    <h2>Search for Products by Category</h2>
    <form action=''>
        <input type='text' name='search' placeholder='Enter category...'/>
        <input type='submit' value='Search'/>
    </form>";

// Search functionality
if (isset($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $sql = "SELECT * FROM products WHERE category LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<div class='product'>
                <h3>" . $row["name"] . "</h3>
                <p>" . $row["description"] . "</p>
                <p>Category: " . $row["category"] . "</p>
                <p>Price: $" . $row["price"] . "</p>
                <p>Stock Quantity: " . $row["stock_quantity"] . "</p>
            </div>";
        }
    } else {
        echo "0 results found.";
    }
}

echo "</div>
</body>
</html>";

$conn->close();
?>