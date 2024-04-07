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

// Create table for products if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
description TEXT NOT NULL,
image VARCHAR(100),
brand VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Function to add product to the database
function addProduct($name, $description, $image, $brand, $conn) {
  $stmt = $conn->prepare("INSERT INTO products (name, description, image, brand) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $name, $description, $image, $brand);
  return $stmt->execute();
}

// Function to fetch all products
function getProducts($conn) {
  $sql = "SELECT id, name, description, image, brand FROM products";
  $result = $conn->query($sql);
  return $result->fetch_all(MYSQLI_ASSOC);
}

// Add product form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['name'])) {
  // Add product to database
  if (addProduct($_POST['name'], $_POST['description'], $_POST['image'], $_POST['brand'], $conn)) {
    echo "<p>Product added successfully!</p>";
  } else {
    echo "<p>Error adding product:</p>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Product to Comparison Tool</title>
</head>
<body>

<h2>Add New Product</h2>
<form action="" method="post">
  <label for="name">Product Name:</label><br>
  <input type="text" id="name" name="name" required><br>
  <label for="description">Description:</label><br>
  <textarea id="description" name="description" required></textarea><br>
  <label for="image">Image URL:</label><br>
  <input type="text" id="image" name="image"><br>
  <label for="brand">Brand:</label><br>
  <input type="text" id="brand" name="brand" required><br>
  <input type="submit" value="Submit">
</form>

<h2>Compare Products</h2>
<?php
$products = getProducts($conn);
if (!empty($products)) {
  echo "<table border='1'><tr><th>Name</th><th>Description</th><th>Image</th><th>Brand</th></tr>";
  foreach ($products as $product) {
    echo "<tr><td>" . htmlspecialchars($product['name']) . "</td><td>" . htmlspecialchars($product['description']) . "</td><td><img src='" . htmlspecialchars($product['image']) . "' alt='" . htmlspecialchars($product['name']) . "' style='width:100px;'></td><td>" . htmlspecialchars($product['brand']) . "</td></tr>";
  }
  echo "</table>";
} else {
  echo "<p>No products found</p>";
}
?>

</body>
</html>

<?php
$conn->close();
?>
