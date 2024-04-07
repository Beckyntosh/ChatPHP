
<?php
// Database configuration
$dbHost = 'db';
$dbUsername = 'root';
$dbPassword = 'root';
$dbName = 'my_database';

// Connect to the database
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$createTable = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description TEXT,
    category VARCHAR(30),
    price DECIMAL(10,2),
    imageURL VARCHAR(100),
    reg_date TIMESTAMP
)";

if (!$conn->query($createTable)) {
    echo "Error creating table: " . $conn->error;
}

// Insert dummy data - this should ideally be done via an admin interface or import script
$insertData = "INSERT INTO products (name, description, category, price, imageURL) VALUES
('Vitamin C', 'Vitamin C 1000mg', 'Vitamins', 9.99, 'images/vitamin_c.png'),
('Vitamin D3', 'Vitamin D3 5000 IU', 'Vitamins', 12.49, 'images/vitamin_d3.png'),
('Multivitamin', 'Multivitamin for all', 'Vitamins', 15.99, 'images/multivitamin.png')
ON DUPLICATE KEY UPDATE name=name";

if (!$conn->query($insertData)) {
    echo "Error inserting data: " . $conn->error;
}

// Fetch products
$getProducts = "SELECT * FROM products";
$result = $conn->query($getProducts);

$products = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vitamin Comparison Tool</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .products { display: flex; flex-wrap: wrap; justify-content: space-around; }
        .product { border: 1px solid #ddd; margin: 10px; padding: 10px; width: calc(33% - 22px); }
        img { width: 100%; height: auto; }
    </style>
</head>
<body>
    <h1>Vitamin Comparison Tool</h1>
    <div class="products">
        <?php foreach ($products as $product): ?>
        <div class="product">
            <img src="<?php echo htmlspecialchars($product['imageURL']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
            <h2><?php echo htmlspecialchars($product['name']); ?></h2>
            <p><?php echo htmlspecialchars($product['description']); ?></p>
            <p>Category: <?php echo htmlspecialchars($product['category']); ?></p>
            <p>Price: $<?php echo htmlspecialchars($product['price']); ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>

This script establishes a connection to a MySQL database, creates a `products` table if not already present, inserts some dummy data related to vitamins (to be executed only once ideally), fetches all products, and finally displays them in a very basic HTML format. For brevity and simplicity, error handling and security measures (like prepared statements) are not as robust as they would be in a production environment. 

Remember, deploying this code directly is not recommended without thorough review and enhancement, especially regarding security practices like SQL injection prevention and database credential management.