<?php
// Simple PHP & MySQL based Hair Care Product Comparison Tool Example

// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt MySQL server connection
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create products table and comparison table if not exists
try {
    $createQuery = "
    CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        image VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB;
    
    CREATE TABLE IF NOT EXISTS comparisons (
        id INT AUTO_INCREMENT PRIMARY KEY,
        product1_id INT NOT NULL,
        product2_id INT NOT NULL,
        FOREIGN KEY (product1_id) REFERENCES products (id) ON DELETE CASCADE,
        FOREIGN KEY (product2_id) REFERENCES products (id) ON DELETE CASCADE
    ) ENGINE=InnoDB;
    ";
    $pdo->exec($createQuery);
} catch (PDOException $e) {
    die("ERROR: Could not create table. " . $e->getMessage());
}

// Helper function to fetch all products
function fetchProducts($pdo) {
    try {
        $sql = "SELECT * FROM products";
        $result = $pdo->query($sql);
        return $result->fetchAll();
    } catch (PDOException $e) {
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}

// Insert demo products for illustrative purposes
try {
    $demoProducts = [
        ['name' => 'Hair Serum X', 'description' => 'Description for Hair Serum X. It\'s designed for...', 'image' => 'image_url_here'],
        ['name' => 'Shampoo Y', 'description' => 'Description for Shampoo Y. It offers...', 'image' => 'image_url_here'],
    ];

    foreach ($demoProducts as $product) {
        $sql = "INSERT INTO products (name, description, image) VALUES (:name, :description, :image)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $product['name']);
        $stmt->bindParam(':description', $product['description']);
        $stmt->bindParam(':image', $product['image']);
        $stmt->execute();
    }
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Handling front-end
$products = fetchProducts($pdo);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hair Care Products Comparison</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .product { margin-bottom: 20px; }
        .comparison { margin-top: 20px; }
    </style>
</head>
<body>
<h1>Compare Hair Care Products</h1>
<form action="compare.php" method="POST">
    <div class="product">
        <label for="product1">Choose Product 1:</label>
        <select name="product1">
            <?php foreach ($products as $product) { ?>
                <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="product">
        <label for="product2">Choose Product 2:</label>
        <select name="product2">
            <?php foreach ($products as $product) { ?>
                <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
            <?php } ?>
        </select>
    </div>
    <button type="submit">Compare</button>
</form>

Just a placeholder for where the comparison would be rendered
<div class="comparison">
Here you would handle the comparison logic and rendering based on the form submission
</div>

</body>
</html>
