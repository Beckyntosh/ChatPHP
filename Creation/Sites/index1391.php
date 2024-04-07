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
$tableCheck = "CREATE TABLE IF NOT EXISTS orders (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  productName VARCHAR(30) NOT NULL,
  customSize VARCHAR(50),
  orderDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($tableCheck) === TRUE) {
  // echo "Table orders created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

function addOrder($conn, $productName, $customSize) {
  $stmt = $conn->prepare("INSERT INTO orders (productName, customSize) VALUES (?, ?)");
  $stmt->bind_param("ss", $productName, $customSize);
  $stmt->execute();

  echo "Order added successfully";
  $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $productName = $_POST['productName'];
  $customSize = $_POST['customSize'];

  addOrder($conn, $productName, $customSize);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Order</title>
</head>
<body>
  <h2>Add Product Order</h2>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <label for="productName">Product Name:</label><br>
    <input type="text" id="productName" name="productName" value="wooden dining table"><br>
    <label for="customSize">Custom Size:</label><br>
    <input type="text" id="customSize" name="customSize" value=""><br><br>
    <input type="submit" value="Submit">
  </form> 
</body>
</html>
