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

// Create products table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    category VARCHAR(50),
    price DECIMAL(10, 2) NOT NULL,
    image_url VARCHAR(255),
    reg_date TIMESTAMP
)";

if (!$conn->query($sql)) {
    echo "Error creating table: " . $conn->error;
}

// Insert example products if not already inserted
$productInserts = [
    ["iPhone 13", "Latest iPhone model", "Smartphones", 999.99, "https://example.com/iphone13.jpg"],
    ["Samsung Galaxy S21", "Latest Samsung Galaxy model", "Smartphones", 899.99, "https://example.com/galaxyS21.jpg"]
];

foreach ($productInserts as $product) {
    $stmt = $conn->prepare("INSERT INTO products (name, description, category, price, image_url) VALUES (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE id=id");
    $stmt->bind_param("sssdss", ...$product);
    $stmt->execute();
}

$stmt->close();

// Fetch and compare two products based on `GET` parameters
$product1 = $_GET['product1'] ?? "";
$product2 = $_GET['product2'] ?? "";

$sql = "SELECT * FROM products WHERE name IN (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $product1, $product2);
$stmt->execute();
$result = $stmt->get_result();

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Comparison</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header, footer {
            background: #e3f2fd;
            color: #333;
            text-align: center;
            padding: 1em 0;
        }
        article {
            margin-top: 20px;
            display: flex;
            justify-content: space-around;
        }
        .product {
            background: #fff;
            padding: 10px;
            width: 48%;
        }
        .product img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <header>
        <h1>Product Comparison</h1>
    </header>
    
    <div class="container">
        <article>
            <?php foreach ($products as $product): ?>
                <div class="product">
                    <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                    <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                    <p><?php echo htmlspecialchars($product['description']); ?></p>
                    <h3>$<?php echo htmlspecialchars($product['price']); ?></h3>
                </div>
            <?php endforeach; ?>
        </article>
    </div>

    <footer>
        <p>Product Comparison Tool</p>
    </footer>
</body>
</html>
