<?php
// Initialize the session
session_start();

// Database configuration
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

// Table creation, execute only once
*
$sql = "CREATE TABLE IF NOT EXISTS shopping_cart (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id VARCHAR(30) NOT NULL,
product_id INT(6) NOT NULL,
quantity INT(3) NOT NULL,
reg_date TIMESTAMP
)";

$conn->query($sql);
*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $action = $_POST['action'];
  
  // Save Cart
  if ($action == "save") {
    $userId = $_SESSION['user_id']; // Assuming you're storing the user ID in session after login
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    
    $sql = "INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES (?, ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
      $stmt->bind_param("sii", $userId, $productId, $quantity);
      $stmt->execute();
      echo "Cart saved successfully!";
    } else {
      echo "Error saving cart!";
    }
    $stmt->close();
  }
}

// Retrieve Cart
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_SESSION['user_id'])) {
  $userId = $_SESSION['user_id'];
  $sql = "SELECT * FROM shopping_cart WHERE user_id = ?";
  if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
      echo "<table><tr><th>ID</th><th>Product ID</th><th>Quantity</th></tr>";
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["product_id"]."</td><td>".$row["quantity"]."</td></tr>";
      }
      echo "</table>";
    } else {
      echo "0 results";
    }
    $stmt->close();
  }
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
<title>Shopping Cart</title>
</head>
<body>

<h2>Save Your Shopping Cart</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="product_id">Product ID:</label><br>
  <input type="text" id="product_id" name="product_id" required><br>
  <label for="quantity">Quantity:</label><br>
  <input type="text" id="quantity" name="quantity" required><br><br>
  <input type="hidden" name="action" value="save">
  <input type="submit" value="Save">
</form> 

</body>
</html>
