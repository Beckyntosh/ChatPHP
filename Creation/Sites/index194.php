<?php
// Database configuration and connection
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

// Create table for products if not exists
$query = "CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productName VARCHAR(30) NOT NULL,
productPrice DECIMAL(10, 2) NOT NULL,
productFeatures TEXT,
reg_date TIMESTAMP
)";
$conn->query($query);

// Create table for comparisons if not exists
$query = "CREATE TABLE IF NOT EXISTS comparisons (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productIds TEXT NOT NULL,
reg_date TIMESTAMP
)";
$conn->query($query);

// Add product function
function addProduct($conn, $productName, $productPrice, $productFeatures) {
  $stmt = $conn->prepare("INSERT INTO products (productName, productPrice, productFeatures) VALUES (?, ?, ?)");
  $stmt->bind_param("sds", $productName, $productPrice, $productFeatures);
  $stmt->execute();
  $stmt->close();
}

// Handle POST request for adding product
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addProduct"])) {
  $productName = $_POST["productName"];
  $productPrice = $_POST["productPrice"];
  $productFeatures = $_POST["productFeatures"];
  addProduct($conn, $productName, $productPrice, $productFeatures);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product to Comparison Tool</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            background-color: #f3f3f3;
        }
        .container {
            width: 80%;
            margin: auto;
            background: white;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Product to Grocery Comparison Tool</h1>
        <form method="post">
            <input type="text" name="productName" placeholder="Product Name" required><br><br>
            <input type="text" name="productPrice" placeholder="Product Price" required><br><br>
            <textarea name="productFeatures" placeholder="Product Features" required></textarea><br><br>
            <button type="submit" name="addProduct">Add Product</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>