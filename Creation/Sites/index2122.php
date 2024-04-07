<?php
// Shopping Cart Save & Retrieval for a Sporting Goods website
// Note: This is a simplified example. In production, you should add error handling, input validation, etc.

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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS shopping_cart (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(11) NOT NULL,
product_id INT(11) NOT NULL,
quantity INT(11) NOT NULL,
saved_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === FALSE) {
  echo "Error creating table: " . $conn->error;
}

// Handle Save Cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['saveCart'])) {
  $userId = $_POST['userId'];
  $productId = $_POST['productId'];
  $quantity = $_POST['quantity'];

  // Ideally, validation and sanitation of inputs should be done here
  
  $stmt = $conn->prepare("INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
  $stmt->bind_param("iii", $userId, $productId, $quantity);
  
  if ($stmt->execute()) {
    echo "Cart saved successfully";
  } else {
    echo "Error: " . $stmt->error;
  }
  
  $stmt->close();
}

// Handle Retrieve Cart
$userCartItems = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['retrieveCart'])) {
  $userId = $_POST['userId'];
  
  $stmt = $conn->prepare("SELECT product_id, quantity FROM shopping_cart WHERE user_id = ?");
  $stmt->bind_param("i", $userId);
  $stmt->execute();
  $result = $stmt->get_result();
  
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $userCartItems[] = $row;
    }
  }
  
  $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sporting Goods Shopping Cart</title>
</head>
<body>
    <h2>Save Shopping Cart</h2>
    <form method="post">
Assume user ID is 1 for this example
        <label for="productId">Product ID:</label>
        <input type="number" id="productId" name="productId" required>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>
        <button type="submit" name="saveCart">Save Cart</button>
    </form>

    <h2>Retrieve Shopping Cart</h2>
    <form method="post">
Assume user ID is 1 for this example
        <button type="submit" name="retrieveCart">Retrieve Cart</button>
    </form>

    <?php
    if (!empty($userCartItems)) {
        echo "<h3>Your Cart Items</h3>";
        echo "<ul>";
        foreach ($userCartItems as $item) {
            echo "<li>Product ID: " . $item['product_id'] . ", Quantity: " . $item['quantity'] . "</li>";
        }
        echo "</ul>";
    }
    ?>

</body>
</html>

<?php
$conn->close();
?>
