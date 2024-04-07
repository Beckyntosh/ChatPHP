<?php

$host = 'db';
$db   = 'my_database';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maternity Wear & Children's Educational Site</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f6;
            color: #333;
        }
        header {
            background-color: #0038a8;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }
        .container {
            padding: 20px;
        }
        .products {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .product {
            width: calc(33.333% - 20px);
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #fff;
        }
        .product h3 {
            color: #0038a8;
        }
        @media only screen and (max-width: 600px) {
            .product {
                width: calc(50% - 20px);
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Modern Metropolis Maternity Wear &amp; Children's Educational Tools</h1>
    </header>
    <div class="container">
        <h2>Categories</h2>
        <?php
        $sql = "SELECT DISTINCT category FROM products ORDER BY category";
        $stmt = $pdo->query($sql);
        
        echo "<ul>";
        while ($row = $stmt->fetch()) {
            echo "<li><a href='?category=" . $row['category'] . "'>" . htmlspecialchars($row['category']) . "</a></li>";
        }
        echo "</ul>";
        
        if (isset($_GET['category'])) {
            $category = $_GET['category'];
            $sql = "SELECT * FROM products WHERE category = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$category]);
            $products = $stmt->fetchAll();
            
            echo "<div class='products'>";
            foreach ($products as $product) {
                echo "<div class='product'>";
                echo "<h3>" . htmlspecialchars($product['name']) . "</h3>";
                echo "<p>" . htmlspecialchars($product['description']) . "</p>";
                echo "<p>Price: $" . htmlspecialchars($product['price']) . "</p>";
                echo "<p>Stock: " . htmlspecialchars($product['stock_quantity']) . "</p>";
                echo "</div>";
            }
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>