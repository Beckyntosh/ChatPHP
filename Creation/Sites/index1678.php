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

// Create table if it doesn't exist
$table = "CREATE TABLE IF NOT EXISTS HairCareProducts (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productName VARCHAR(50) NOT NULL,
productType VARCHAR(30) NOT NULL,
keyIngredient VARCHAR(50),
price DECIMAL(10, 2) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
  echo "Table HairCareProducts created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// HTML Form for adding product
echo '<!DOCTYPE html>
<html>
<head>
<title>Add Product to Comparison Tool</title>
</head>
<body>
<h2>Add Product</h2>
<form action="" method="post">
  Product Name: <input type="text" name="productName"><br>
  Product Type: <input type="text" name="productType"><br>
  Key Ingredient: <input type="text" name="keyIngredient"><br>
  Price: <input type="text" name="price"><br>
  <input type="submit" name="submit" value="Add Product">
</form>
</body>
</html>';

// Insert product into database
if (isset($_POST['submit'])) {
  $productName = $_POST['productName'];
  $productType = $_POST['productType'];
  $keyIngredient = $_POST['keyIngredient'];
  $price = $_POST['price'];

  $sql = "INSERT INTO HairCareProducts (productName, productType, keyIngredient, price)
  VALUES ('$productName', '$productType', '$keyIngredient', '$price')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
