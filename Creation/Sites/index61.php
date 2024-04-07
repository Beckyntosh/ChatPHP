<?php
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

// Create tables if they don't exist
$sqlProducts = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description TEXT NOT NULL,
    category VARCHAR(50),
    price DECIMAL(10, 2) NOT NULL,
    ratings DECIMAL(2, 1),
    reg_date TIMESTAMP)";

$conn->query($sqlProducts);

$category = isset($_GET['category']) ? $_GET['category'] : '';
$minPrice = isset($_GET['minPrice']) ? $_GET['minPrice'] : 0;
$maxPrice = isset($_GET['maxPrice']) ? $_GET['maxPrice'] : 1000000;
$rating = isset($_GET['rating']) ? $_GET['rating'] : 0;

$sqlSearch = "SELECT * FROM products WHERE category LIKE '%$category%' AND price BETWEEN $minPrice AND $maxPrice AND ratings >= $rating";

$result = $conn->query($sqlSearch);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Office Supplies E-commerce</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .product { border: 1px solid #ccc; margin-bottom: 10px; padding: 10px; }
        .product-name { font-size: 18px; color: #333; }
        .product-price { color: #F00; }
        .product-category, .product-ratings { color: #777; }
    </style>
</head>
<body>
    <h1>Office Supplies Search</h1>
    <form action="" method="get">
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" value="<?= $category ?>">
        <label for="minPrice">Min Price:</label>
        <input type="number" id="minPrice" name="minPrice" value="<?= $minPrice ?>">
        <label for="maxPrice">Max Price:</label>
        <input type="number" id="maxPrice" name="maxPrice" value="<?= $maxPrice ?>">
        <label for="rating">Min Rating:</label>
        <input type="number" step="0.1" id="rating" name="rating" value="<?= $rating ?>">
        <button type="submit">Search</button>
    </form>
    <div id="results">
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="product">
                    <div class="product-name"><?= $row["name"] ?></div>
                    <div class="product-price">$<?= $row["price"] ?></div>
                    <div class="product-category">Category: <?= $row["category"] ?></div>
                    <div class="product-ratings">Ratings: <?= $row["ratings"] ?></div>
                    <div class="product-description"><?= $row["description"] ?></div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No products found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
<?php $conn->close(); ?>