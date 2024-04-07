<?php
// Database configuration
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

// Create Product Table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS Products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  productName VARCHAR(50) NOT NULL,
  productType VARCHAR(50),
  price DECIMAL(10, 2) NOT NULL,
  specifications TEXT,
  reg_date TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
  echo "Table Products created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert Dummy Products
$products = [
  ["iPhone 13", "Smartphone", 999.99, "64GB RAM, 6.1 Inch Display"],
  ["Samsung Galaxy S21", "Smartphone", 799.99, "128GB RAM, 6.2 Inch Display"]
];
$stmt = $conn->prepare("INSERT INTO Products (productName, productType, price, specifications) VALUES (?, ?, ?, ?)");
foreach ($products as $product) {
    $stmt->bind_param("ssds", $product[0], $product[1], $product[2], $product[3]);
    $stmt->execute();
}
$stmt->close();

// Retrieving Products for Comparison
$sql = "SELECT * FROM Products";
$result = $conn->query($sql);

// Closing DB Connection
$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Comparison Tool</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .product { border: 1px solid #ddd; padding: 10px; margin: 10px; }
    </style>
</head>
<body>
<h2>Compare Products</h2>
<div id="products">
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='product'>";
            echo "<h3>" . $row["productName"]. "</h3>";
            echo "<p>Type: " . $row["productType"]. "</p>";
            echo "<p>Price: $" . $row["price"]. "</p>";
            echo "<p>Specs: " . $row["specifications"]. "</p>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }
    ?>
</div>

</body>
</html>
