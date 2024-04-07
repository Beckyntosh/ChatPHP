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

// Create table for products if it does not exist
$table_sql = "CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(50) NOT NULL,
  category VARCHAR(30) NOT NULL,
  description TEXT,
  price DECIMAL(10, 2) NOT NULL,
  reg_date TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
  echo "Table products created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert Products if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $product_name = $_POST['product_name'];
  $category = $_POST['category'];
  $description = $_POST['description'];
  $price = $_POST['price'];

  $insert_sql = "INSERT INTO products (product_name, category, description, price)
  VALUES ('$product_name', '$category', '$description', '$price')";

  if ($conn->query($insert_sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $insert_sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Product to Comparison Tool</title>
</head>
<body>
  <h2>Add Product</h2>
  <form action="" method="post">
    <label for="product_name">Product Name:</label><br>
    <input type="text" id="product_name" name="product_name" required><br>
    <label for="category">Category:</label><br>
    <input type="text" id="category" name="category" required><br>
    <label for="description">Description:</label><br>
    <textarea id="description" name="description" required></textarea><br>
    <label for="price">Price:</label><br>
    <input type="number" id="price" name="price" step="0.01" required><br><br>
    <input type="submit" value="Submit">
  </form>
</body>
</html>
