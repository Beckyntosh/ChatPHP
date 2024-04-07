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

// Create the Products Table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS Products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
brand VARCHAR(30) NOT NULL,
description TEXT,
price DECIMAL(10, 2) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table Products created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handling form data and inserting it into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $brand = $_POST['brand'];
  $description = $_POST['description'];
  $price = $_POST['price'];

  $stmt = $conn->prepare("INSERT INTO Products (name, brand, description, price) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("sssd", $name, $brand, $description, $price);

  if($stmt->execute()) {
    echo "<script>alert('Product added successfully');</script>";
  } else {
    echo "<script>alert('Error adding product');</script>";
  }
  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Product to Comparison Tool</title>
  <style>
    body { font-family: Arial, sans-serif; }
    .container { max-width: 600px; margin: auto; padding: 20px; }
    input[type=text], input[type=number] { width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
    input[type=submit] { width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer; }
    input[type=submit]:hover {background-color: #45a049;}
    .title { text-align: center; margin-bottom: 40px; }
  </style>
</head>
<body>
<div class="container">
  <div class="title">
    <h2>Add Product</h2>
  </div>
  <form action="" method="post">
    <label for="name">Product Name</label>
    <input type="text" id="name" name="name" required>
    
    <label for="brand">Brand</label>
    <input type="text" id="brand" name="brand" required>
    
    <label for="description">Description</label>
    <input type="text" id="description" name="description">
    
    <label for="price">Price</label>
    <input type="number" id="price" name="price" step="0.01" required>
    
    <input type="submit" value="Add Product">
  </form>
</div>
</body>
</html>
