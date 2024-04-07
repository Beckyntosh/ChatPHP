<?php
// File: index.php

// Database connection settings
$host = 'db';
$db   = 'my_database';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

// DSN (Data Source Name)
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

// Handle Add to Favorites
if (isset($_POST['add_to_favorites'])) {
    $productId = $_POST['product_id'];
    $userId = 1; // Static user for demonstration
    
    $sql = "CREATE TABLE IF NOT EXISTS favorites (
                id INT AUTO_INCREMENT PRIMARY KEY,
                product_id INT,
                user_id INT,
                FOREIGN KEY(product_id) REFERENCES products(id),
                FOREIGN KEY(user_id) REFERENCES users(id)
            )";
    $pdo->exec($sql);

    $insertSql = "INSERT INTO favorites (product_id, user_id) VALUES (?, ?)";
    $stmt = $pdo->prepare($insertSql);
    $stmt->execute([$productId, $userId]);
}

// Retrieve all products
$stmt = $pdo->query('SELECT * FROM products');
$products = $stmt->fetchAll();

// HTML and PHP mix for showing products and add to favorites functionality
?>
<!DOCTYPE html>
<html>
<head>
    <title>Fitness Equipment Store</title>
    <style>
        body {
            background-color: #0A0A23;
            color: #FFF;
            font-family: Arial, sans-serif;
        }
        .product-card {
            background-color: #161645;
            border: 1px solid #444;
            padding: 20px;
            margin-bottom: 20px;
        }
        .add-to-favorites {
            background-color: #24a0ed;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<h1>Fitness Equipment Digital Product Selling Site</h1>

<?php foreach ($products as $product): ?>
    <div class="product-card">
        <h2><?= htmlspecialchars($product['name']) ?></h2>
        <p><?= htmlspecialchars($product['description']) ?></p>
        <form action="" method="post">
            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
            <button type="submit" name="add_to_favorites" class="add-to-favorites">Add to Favorites</button>
        </form>
    </div>
<?php endforeach; ?>

</body>
</html>