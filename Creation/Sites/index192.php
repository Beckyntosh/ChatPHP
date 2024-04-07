<?php
// Simple PHP backend code for adding products for comparison on a Smartphones website

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

// Create products and comparison tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS Products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  features TEXT NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  reg_date TIMESTAMP
)";

$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS ProductComparison (
  comparison_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_id1 INT(6) UNSIGNED,
  product_id2 INT(6) UNSIGNED,
  FOREIGN KEY (product_id1) REFERENCES Products(id),
  FOREIGN KEY (product_id2) REFERENCES Products(id),
  reg_date TIMESTAMP
)";

$conn->query($sql);

// Backend functionality for adding products to database
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_product"])) {
  $name = $_POST['name'];
  $features = $_POST['features'];
  $price = $_POST['price'];

  $stmt = $conn->prepare("INSERT INTO Products (name, features, price) VALUES (?, ?, ?)");
  $stmt->bind_param("ssd", $name, $features, $price);
  
  if ($stmt->execute()) {
    echo "New product added successfully.";
  } else {
    echo "Error adding product: " . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Product to Comparison Tool</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #000;
    color: #0f0;
  }
  form, .product {
    background-color: #111;
    padding: 20px;
    margin-top: 20px;
  }
  input, button {
    padding: 10px;
    margin: 10px 0;
  }
  button {
    background-color: #333;
    color: #0f0;
    border: none;
  }
</style>
</head>
<body>

<h2>Add Product to Comparison Tool</h2>

<form action="" method="post">
  <label for="name">Product Name:</label><br>
  <input type="text" id="name" name="name" required><br>
  <label for="features">Features:</label><br>
  <textarea id="features" name="features" required></textarea><br>
  <label for="price">Price:</label><br>
  <input type="number" id="price" name="price" step="0.01" required><br>
  <button type="submit" name="add_product">Add Product</button>
</form>

</body>
</html>