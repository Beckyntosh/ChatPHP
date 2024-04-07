<?php
// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create product table if it does not exist
try {
    $query = "
    CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        brand VARCHAR(255) NOT NULL,
        description TEXT,
        image VARCHAR(255)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $pdo->exec($query);
    echo "Table created successfully.";
} catch (PDOException $e) {
    die("ERROR: Could not execute $sql. " . $e->getMessage());
}

// Add product
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    
    $sql = "INSERT INTO products (name, brand, description, image) VALUES (:name, :brand, :description, :image)";
    
    if ($stmt = $pdo->prepare($sql)) {
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":brand", $brand, PDO::PARAM_STR);
        $stmt->bindParam(":description", $description, PDO::PARAM_STR);
        $stmt->bindParam(":image", $image, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            echo "<script>alert('Product added successfully.');</script>";
        } else {
            echo "<script>alert('Error. Please try again.');</script>";
        }
    }
    unset($stmt);
}

// Close connection
unset($pdo);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product to Comparison Tool</title>
</head>
<body>
    <h2>Add New Product</h2>
    <form method="post">
        <label for="name">Product Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="brand">Brand:</label><br>
        <input type="text" id="brand" name="brand" required><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br>
        <label for="image">Image URL:</label><br>
        <input type="text" id="image" name="image" required><br><br>
        <input type="submit" value="Add Product">
    </form>
</body>
</html>
