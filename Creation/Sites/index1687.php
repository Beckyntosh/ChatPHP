<?php

$server = "db";
$username = "root";
$password = "root";
$dbname = "my_instruments";

// Create connection
$conn = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create products table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    category VARCHAR(50),
    price DECIMAL(10, 2) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

function addProductToCompare($productId) {
    $_SESSION['compare'][$productId] = $productId;
}

function getProductsForComparison($conn) {
    $productIds = isset($_SESSION['compare']) ? array_keys($_SESSION['compare']) : [];
    $in  = str_repeat('?,', count($productIds) - 1) . '?';
    $sql = "SELECT * FROM products WHERE id IN ($in)";
    $stmt = $conn->prepare($sql);
    $types = str_repeat('i', count($productIds));
    $stmt->bind_param($types, ...$productIds);
    $stmt->execute();
    $result = $stmt->get_result();
    $products = [];
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    return $products;
}

session_start();

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['productId']) && is_numeric($_POST['productId'])) {
        addProductToCompare((int)$_POST['productId']);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Comparison Tool</title>
</head>
<body>
    <h2>Compare Musical Instruments</h2>
    <form action="" method="post">
        <label for="productId">Product ID:</label>
        <input type="number" id="productId" name="productId" required>
        <input type="submit" value="Add to Comparison">
    </form>

    <h3>Comparison</h3>
    <?php
    if(!empty($_SESSION['compare'])) {
        $products = getProductsForComparison($conn);

        echo "<table border='1' cellpadding='5'><tr><th>Name</th><th>Description</th><th>Category</th><th>Price</th></tr>";
        foreach ($products as $product) {
            echo "<tr><td>".$product['name']."</td>
                      <td>".$product['description']."</td>
                      <td>".$product['category']."</td>
                      <td>".$product['price']."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Add products to compare them.";
    }
    ?>

</body>
</html>

<?php
$conn->close();
?>
