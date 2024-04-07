<?php
// Database connection parameters
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

// Creating tables if they don't exist
$tables = [
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
    ('user3', 'User Three', 'user3@example.com', 'password3');",
];

foreach ($tables as $query) {
    if (!$conn->query($query)) {
        echo "Error creating table: " . $conn->error;
    }
}

// Search functionality
$search = $_GET['search'] ?? '';

$productResults = [];
if ($search) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE CONCAT('%', ?, '%') OR description LIKE CONCAT('%', ?, '%')");
    $stmt->bind_param("ss", $search, $search);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $productResults[] = $row;
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forest Fantasy Clothing and Fitness Tracker</title>
    <style>
        body {
            background-color: #e3f2fd;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #4caf50;
            color: #ffffff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #0779e4 3px solid;
        }
        header h1 {
            text-align: center;
            margin: 0;
            font-size: 24px;
        }
        .search-box {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .search-box input[type="text"] {
            width: 300px;
            padding: 10px;
        }
        .search-box input[type="submit"] {
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
        }
        .product {
            background-color: #f0f4c3;
            margin: 10px 0;
            padding: 20px;
            border-radius: 5px;
        }
        .product h2 {
            margin: 0 0 10px;
        }
        .product p {
            margin: 4px 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Forest Fantasy Clothing and Fitness Tracker</h1>
    </header>

    <div class="container">
        <div class="search-box">
            <form action="" method="get">
                <input type="text" name="search" placeholder="Search products...">
                <input type="submit" value="Search">
            </form>
        </div>

        <?php if (!empty($productResults)): ?>
            <?php foreach ($productResults as $product): ?>
                <div class="product">
                    <h2><?= htmlspecialchars($product['name']) ?></h2>
                    <p><?= htmlspecialchars($product['description']) ?></p>
                    <p>Category: <?= htmlspecialchars($product['category']) ?></p>
                    <p>Price: $<?= htmlspecialchars($product['price']) ?></p>
                    <p>Stock: <?= htmlspecialchars($product['stock_quantity']) ?></p>
                </div>
            <?php endforeach; ?>
        <?php elseif ($search): ?>
            <p>No products found matching your criteria.</p>
        <?php endif; ?>
    </div>
</body>
</html>