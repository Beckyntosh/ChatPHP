
<?php
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Function to get products from the database
function getProducts($conn) {
    $sql = "SELECT id, name, brand, description, price FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Function to add comparisons (optional, for users to save their comparisons)
function addComparison($conn, $product1_id, $product2_id) {
    $stmt = $conn->prepare("INSERT INTO comparisons (product1_id, product2_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $product1_id, $product2_id);
    $stmt->execute();
    return $stmt->insert_id;
}

// HTML Frontend
$products = getProducts($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skin Care Products Comparison</title>
    <style>
        /* Basic CSS styles */
        body { font-family: Arial, sans-serif; }
        .product { margin-bottom: 20px; }
    </style>
</head>
<body>
    <h1>Compare Skin Care Products</h1>
    <div class="product-selection">
        <form method="POST" action="yourComparisonHandler.php">
            <div class="product" id="product1">
                <label for="product1">Product 1:</label>
                <select name="product1">
                    <?php foreach ($products as $product): ?>
                        <option value="<?php echo $product['id']; ?>"><?php echo htmlspecialchars($product['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="product" id="product2">
                <label for="product2">Product 2:</label>
                <select name="product2">
                    <?php foreach ($products as $product): ?>
                        <option value="<?php echo $product['id']; ?>"><?php echo htmlspecialchars($product['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit">Compare</button>
        </form>
    </div>
</body>
</html>
<?php
$conn->close();
?>

This code provides a basic framework. Modify it according to your specific requirements, such as front-end styling, comparison logic, and additional functionalities like user reviews, rating comparisons, or product attribute comparisons. Remember, the actual appearance ("excited style") and other specific functionalities can be implemented via CSS and additional PHP logic.