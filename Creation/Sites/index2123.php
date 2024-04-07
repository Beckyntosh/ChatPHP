<?php
// Connect to Database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create Table for Shopping Cart if it doesn't exist
$cartTable = "CREATE TABLE IF NOT EXISTS shopping_cart (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(255) NOT NULL,
  quantity INT(10) NOT NULL,
  user_id INT(10) NOT NULL,
  saved_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!$conn->query($cartTable)) {
  echo "Error creating table: " . $conn->error;
}

$action = $_POST['action'] ?? '';
$userId = 1; // Assuming a fixed user id for demonstration

switch ($action) {
  case "save":
    $productName = $_POST['product'];
    $quantity = $_POST['quantity'];
    $sql = $conn->prepare("INSERT INTO shopping_cart (product_name, quantity, user_id) VALUES (?, ?, ?)");
    $sql->bind_param("sii", $productName, $quantity, $userId);
    if ($sql->execute()) {
      echo "Product added to cart successfully!";
    } else {
      echo "Error: " . $sql->error;
    }
    break;
  
  case "retrieve":
    $sql = "SELECT id, product_name, quantity FROM shopping_cart WHERE user_id = $userId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      echo "<ul>";
      while ($row = $result->fetch_assoc()) {
        echo "<li>Product: " . $row['product_name'] . ", Quantity: " . $row['quantity'] . "</li>";
      }
      echo "</ul>";
    } else {
      echo "No products in cart";
    }
    break;

  default:
    echo "Welcome to your Shopping Cart";
    break;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Desktop Computers - Shopping Cart</title>
  <style>
    body {
        background-color: #f0f8ff;
        font-family: Arial, sans-serif;
    }
    .container {
        max-width: 600px;
        margin: auto;
        padding: 20px;
    }
    .form-group {
        margin-bottom: 10px;
    }
    label {
        display: block;
        margin-bottom: 5px;
    }
    input[type="text"], input[type="number"] {
        width: 100%;
        padding: 8px;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Add Product to Cart</h2>
    <form action="?" method="post">
      <div class="form-group">
        <label for="product">Product Name:</label>
        <input type="text" name="product" id="product" required>
      </div>
      <div class="form-group">
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" min="1" required>
      </div>
      <input type="hidden" name="action" value="save">
      <input type="submit" value="Save to Cart">
    </form>
    
    <h2>Your Cart</h2>
    <form action="?" method="post">
      <input type="hidden" name="action" value="retrieve">
      <input type="submit" value="Retrieve Cart">
    </form>
  </div>
</body>
</html>
