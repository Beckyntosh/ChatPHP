<?php
// Define variables for database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Attempt to connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$sqlProducts = "CREATE TABLE IF NOT EXISTS Products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description TEXT NOT NULL,
    reg_date TIMESTAMP
)";

$sqlOrders = "CREATE TABLE IF NOT EXISTS Orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_id INT(6) UNSIGNED,
    quantity INT(3) NOT NULL,
    order_date TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES Products(id)
)";

if (!$conn->query($sqlProducts) || !$conn->query($sqlOrders)) {
  echo "Error creating table: " . $conn->error;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $productId = $_POST["product_id"];
  $quantity = $_POST["quantity"];

  // Insert order into database
  $sql = "INSERT INTO Orders (product_id, quantity) VALUES (?, ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $productId, $quantity);
  
  if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Order</title>
</head>
<body>
    <h2>Add New Order</h2>
    <form method="POST">
        <label for="product_id">Product ID:</label><br>
        <input type="number" id="product_id" name="product_id" required><br>
        
        <label for="quantity">Quantity:</label><br>
        <input type="number" id="quantity" name="quantity" required><br>
        
        <input type="submit" value="Add Order">
    </form>
</body>
</html>
<?php
$conn->close();
?>
