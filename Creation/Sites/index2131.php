<?php
// Define database connection parameters
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

// Create table for shopping cart if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS shopping_cart (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(6) UNSIGNED,
  item_details TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($createTable) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Function to save shopping cart
function saveCart($userId, $items, $conn) {
  $itemDetails = json_encode($items);
  $stmt = $conn->prepare("INSERT INTO shopping_cart (user_id, item_details) VALUES (?, ?)");
  $stmt->bind_param("is", $userId, $itemDetails);
  if($stmt->execute()) {
    echo "Cart saved successfully.";
  } else {
    echo "Error saving cart: " . $stmt->error;
  }
  $stmt->close();
}

// Function to retrieve shopping cart
function getCart($userId, $conn) {
  $stmt = $conn->prepare("SELECT item_details FROM shopping_cart WHERE user_id = ? ORDER BY created_at DESC LIMIT 1");
  $stmt->bind_param("i", $userId);
  if($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo "Cart Items: " . $row['item_details'];
    } else {
      echo "No cart found.";
    }
  } else {
    echo "Error retrieving cart: " . $stmt->error;
  }
  $stmt->close();
}

// Check for POST request to save cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['saveCart'])) {
  $userId = $_POST['userId'];
  $items = $_POST['items']; // Expecting items as an array
  saveCart($userId, $items, $conn);
}

// Check for POST request to retrieve cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['getCart'])) {
  $userId = $_POST['userId'];
  getCart($userId, $conn);
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Herbal Supplements</title>
  <style>
    body { font-family: Arial, sans-serif; background-color: #f0f0f0; }
    .container { max-width: 600px; margin: auto; background: white; padding: 20px; }
  </style>
</head>
<body>
<div class="container">
  <h2>Shopping Cart</h2>
  <form method="POST">
Example User ID
    <label for="items">Cart Items (JSON):</label><br>
    <textarea name="items" rows="4" cols="50"></textarea><br><br>
    <input type="submit" name="saveCart" value="Save Cart">
  </form>

  <form method="POST">
Example User ID
    <input type="submit" name="getCart" value="Retrieve Cart">
  </form>
</div>
</body>
</html>
