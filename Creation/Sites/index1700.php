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

// Create Product and Comparison tables if they do not exist
$sql = "CREATE TABLE IF NOT EXISTS Products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
brand VARCHAR(30) NOT NULL,
description TEXT,
price DECIMAL(10, 2) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS Comparisons (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_id1 INT(6) UNSIGNED,
product_id2 INT(6) UNSIGNED,
comparison_date TIMESTAMP,
FOREIGN KEY (product_id1) REFERENCES Products(id),
FOREIGN KEY (product_id2) REFERENCES Products(id)
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission for new product
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["productName"])) {
  $stmt = $conn->prepare("INSERT INTO Products (name, brand, description, price) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("sssd", $productName, $brand, $description, $price);

  $productName = $_POST["productName"];
  $brand = $_POST["brand"];
  $description = $_POST["description"];
  $price = $_POST["price"];

  $stmt->execute();
  echo "New record created successfully";
  $stmt->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Product to Comparison</title>
</head>
<body>
<h2>Add Product</h2>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
  Product Name: <input type="text" name="productName" required><br>
  Brand: <input type="text" name="brand" required><br>
  Description: <textarea name="description" required></textarea><br>
  Price: <input type="number" step="0.01" name="price" required><br>
  <input type="submit" value="Submit">
</form>
</body>
</html>
<?php
$conn->close();
?>
Note: Before running the provided PHP code, ensure your web server and MySQL database are properly configured, including modifying any database connection details as per your environment. This example may require adjustments based on the specifics of your server, PHP version, and database settings.