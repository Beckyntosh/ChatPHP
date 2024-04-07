<?php
// Database connection
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

// Connect to MySQL database
$pdoOptions = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
];

$pdo = new PDO(
    "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE, // DSN
    MYSQL_USER, // Username
    MYSQL_PASSWORD, // Password
    $pdoOptions // Options
);

// Create tables if they don't exist
$pdo->exec("
CREATE TABLE IF NOT EXISTS roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
) ENGINE=InnoDB");

$pdo->exec("
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    role_id INT,
    FOREIGN KEY (role_id) REFERENCES roles(id)
) ENGINE=InnoDB");

$pdo->exec("
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    visible TINYINT DEFAULT 1
) ENGINE=InnoDB");

// Simulate login user role ID
$loggedInUserRoleID = 1; // Example: 1 for admin, 2 for regular user, etc.

// Handling form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $searchTerm = $_POST['searchTerm'] ?? '';

    // Ensure only admins can see all products, others see only visible products
    $additionalCondition = $loggedInUserRoleID == 1 ? "" : "AND visible = 1";
    
    $query = $pdo->prepare("SELECT * FROM products WHERE name LIKE :searchTerm $additionalCondition");
    $query->bindValue(':searchTerm', "%$searchTerm%");
    $query->execute();
    $products = $query->fetchAll(PDO::FETCH_ASSOC);
} else {
    $products = [];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        .product {
            background-color: #fff;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Product Search</h1>
    <form method="POST">
        <input type="text" name="searchTerm" placeholder="Search products..." required>
        <button type="submit">Search</button>
    </form>
    <div class="products">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                <p><?php echo htmlspecialchars($product['description']); ?></p>
            </div>
        <?php endforeach; ?>
        <?php if (count($products) === 0): ?>
            <p>No products found.</p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>