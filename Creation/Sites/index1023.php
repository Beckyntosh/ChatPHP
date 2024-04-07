<?php
// This example demonstrates a basic setup and does not cover all security aspects of SSL configuration and database interaction.
// IMPORTANT: Make sure to replace all placeholder values with your actual data and review security settings.

// Establish a secure connection to the database
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

$dsn = 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DATABASE;
$options = [
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_PERSISTENT => false,
];

try {
    $pdo = new PDO($dsn, MYSQL_USER, MYSQL_PASSWORD, $options);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

// Create table for storing sunglasses products (if not exists)
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS sunglasses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    image_url VARCHAR(255)
)";
$pdo->exec($sqlCreateTable);

// HTML + PHP code to display the sunglasses (frontend part)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self';">
    <title>Sunglasses Shop</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .product { margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
        .product img { max-width: 100px; }
    </style>
</head>
<body>
    <h1>Sunglasses Shop</h1>
    <div class="products">
        <?php
        $stmt = $pdo->query("SELECT * FROM sunglasses");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='product'>";
            echo "<img src='" . htmlspecialchars($row['image_url']) . "' alt='sunglasses'>";
            echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
            echo "<p>$" . number_format(htmlspecialchars($row['price']), 2) . "</p>";
            echo "<p>" . htmlspecialchars($row['description']) . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
