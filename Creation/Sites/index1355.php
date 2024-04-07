<?php
// Database configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

try {
    // Connect to database
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create table for products if it doesn't exist
    $productsTableSql = "CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        description TEXT,
        image_url VARCHAR(1024)
    )";
    $conn->exec($productsTableSql);

    // Create table for comparisons if it doesn't exist
    $comparisonsTableSql = "CREATE TABLE IF NOT EXISTS comparisons (
        id INT AUTO_INCREMENT PRIMARY KEY,
        product1_id INT,
        product2_id INT,
        FOREIGN KEY (product1_id) REFERENCES products(id),
        FOREIGN KEY (product2_id) REFERENCES products(id)
    )";
    $conn->exec($comparisonsTableSql);
    
    echo "Database and tables are ready!<br>";

    // Insert dummy products for demonstration if they don't exist
    $checkProducts = $conn->query("SELECT COUNT(*) FROM products")->fetchColumn();
    if (!$checkProducts) {
        $insertProductsSql = "INSERT INTO products (name, description, image_url) VALUES
        ('iPhone 13', 'An Apple smartphone', 'https://example.com/iphone13.jpg'),
        ('Samsung Galaxy S21', 'A Samsung smartphone', 'https://example.com/samsungs21.jpg')";
        $conn->exec($insertProductsSql);
        echo "Inserted dummy products for demonstration!<br>";
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$action = $_POST['action'] ?? '';

if ($action == 'compare') {
    $product1Id = $_POST['product1'];
    $product2Id = $_POST['product2'];

    // Attempt to insert comparison into database
    try {
        $stmt = $conn->prepare("INSERT INTO comparisons (product1_id, product2_id) VALUES (?, ?)");
        $stmt->execute([$product1Id, $product2Id]);
        
        echo "Comparison saved!<br>";
    } catch(PDOException $e) {
        echo "Error saving comparison: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hair Care Products Comparison</title>
</head>
<body>
    <h2>Welcome to the Funky Hair Care Products Comparison Tool!</h2>
    <form action="" method="post">
        <input type="hidden" name="action" value="compare">
        <label for="product1">Select Product 1:</label>
        <select name="product1" id="product1">
            <?php
            $products = $conn->query("SELECT * FROM products");
            foreach ($products as $product) {
                echo "<option value='{$product['id']}'>{$product['name']}</option>";
            }
            ?>
        </select>
        <br>
        <label for="product2">Select Product 2:</label>
        <select name="product2" id="product2">
            <?php
            $products = $conn->query("SELECT * FROM products");
            foreach ($products as $product) {
                echo "<option value='{$product['id']}'>{$product['name']}</option>";
            }
            ?>
        </select>
        <br>
        <button type="submit">Compare Products!</button>
    </form>
</body>
</html>
