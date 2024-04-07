<?php
//connection variables
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
$sql = "CREATE TABLE IF NOT EXISTS shopping_cart (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED NOT NULL,
product_name VARCHAR(50) NOT NULL,
quantity INT UNSIGNED NOT NULL,
price DECIMAL(10, 2) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Function to save cart
function saveCart($userId, $product, $quantity, $price, $conn) {
  $stmt = $conn->prepare("INSERT INTO shopping_cart (user_id, product_name, quantity, price) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("isii", $userId, $product, $quantity, $price);
  
  if ($stmt->execute()) {
    echo "New records created successfully";
  } else {
    echo "Error: " . $stmt->error;
  }
  
  $stmt->close();
}

// Function to retrieve cart
function retrieveCart($userId, $conn) {
  $sql = "SELECT product_name, quantity, price FROM shopping_cart WHERE user_id = $userId";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "Product: " . $row["product_name"]. " - Quantity: " . $row["quantity"]. " - Price: " . $row["price"]. "<br>";
    }
  } else {
    echo "0 results";
  }
}

// Trigger save cart from form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_cart'])) {
  $userId = $_POST['user_id'];
  $product = $_POST['product_name'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];
  saveCart($userId, $product, $quantity, $price, $conn);
}

// Simple form for saving cart
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gardening Tools - Sherlock Holmes Style</title>
</head>
<body>
    <h2>Save Your Cart</h2>
    <form method="post" action="">
        <label>User ID:</label><br>
        <input type="text" name="user_id" required><br>
        <label>Product Name:</label><br>
        <input type="text" name="product_name" required><br>
        <label>Quantity:</label><br>
        <input type="number" name="quantity" required><br>
        <label>Price:</label><br>
        <input type="text" name="price" required><br>
        <input type="submit" name="save_cart" value="Save">
    </form>

    <?php
    // Auto-retrieve cart for a user example
    if (isset($_GET['user_id'])) {
      $userId = $_GET['user_id'];
      retrieveCart($userId, $conn);
    }
    ?>

    <h2>Retrieve Your Cart</h2>
    <form method="get" action="">
        <label>User ID:</label><br>
        <input type="text" name="user_id" required><br>
        <input type="submit" value="Retrieve">
    </form>
</body>
</html>

<?php
$conn->close();
?>
