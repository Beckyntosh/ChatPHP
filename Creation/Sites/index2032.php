<?php
// Database connection
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

// Create products table if not exists
$createTableSql = "CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  productName VARCHAR(50) NOT NULL,
  brand VARCHAR(30) NOT NULL,
  description TEXT,
  price DECIMAL(10, 2) NOT NULL,
  reg_date TIMESTAMP
)";

if ($conn->query($createTableSql) === TRUE) {
  echo "Table Products created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Add product function
function addProduct($conn, $productName, $brand, $description, $price) {
  $sql = "INSERT INTO products (productName, brand, description, price) VALUES (?, ?, ?, ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssd", $productName, $brand, $description, $price);

  if($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

// Handle form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  addProduct($conn, $_POST["productName"], $_POST["brand"], $_POST["description"], $_POST["price"]);
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
    <h2>Add a product</h2>
    <form method="post">
        <label for="productName">Product Name:</label><br>
        <input type="text" id="productName" name="productName" required><br>
        <label for="brand">Brand:</label><br>
        <input type="text" id="brand" name="brand" required><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br>
        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
