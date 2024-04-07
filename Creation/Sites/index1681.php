<?php
// Connect to the database
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

// Create table if not exists
$tableQuery = "CREATE TABLE IF NOT EXISTS `products` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `sku` varchar(100) NOT NULL,
    `image` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

if (!$conn->query($tableQuery)) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['productName'], $_POST['productDescription'], $_POST['productSKU'])) {
    $name = $conn->real_escape_string($_POST['productName']);
    $description = $conn->real_escape_string($_POST['productDescription']);
    $sku = $conn->real_escape_string($_POST['productSKU']);
    $insertQuery = "INSERT INTO products (name, description, sku) VALUES ('$name', '$description', '$sku')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Skin Care Product Comparison</title>
</head>
<body>
    <h1>Add Product to Comparison Tool</h1>
    <form action="" method="post">
        <label for="productName">Product Name:</label><br>
        <input type="text" id="productName" name="productName" required><br>
        
        <label for="productDescription">Description:</label><br>
        <textarea id="productDescription" name="productDescription" required></textarea><br>
        
        <label for="productSKU">SKU:</label><br>
        <input type="text" id="productSKU" name="productSKU" required><br>

        <input type="submit" value="Add Product">
    </form>
</body>
</html>

<?php
$conn->close();
?>
