<?php
// Database Connection
$dbServername = "db";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "my_database";

// Creating connection
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create reservations table if not exists
$createReservationsTable = "CREATE TABLE IF NOT EXISTS reservations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  product_id INT,
  quantity INT,
  reservation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (product_id) REFERENCES products(id)
);";
if (!$conn->query($createReservationsTable)) {
    die("Error creating table: " . $conn->error);
}

// Handle reservation form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['make_reservation'])) {
  $userId = $_POST['user_id'];
  $productId = $_POST['product_id'];
  $quantity = $_POST['quantity'];

  // Insert reservation into database
  $insertSql = "INSERT INTO reservations (user_id, product_id, quantity) VALUES (?, ?, ?)";
  
  $stmt = $conn->prepare($insertSql);
  $stmt->bind_param("iii", $userId, $productId, $quantity);
  
  if ($stmt->execute()) {
    echo "<div>Reservation made successfully!</div>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Make a Reservation</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f5f5f5; color: #333; }
        .container { max-width: 600px; margin: 20px auto; background-color: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        input, select, button { padding: 10px; margin: 10px 0; width: 100%; box-sizing: border-box; }
        button { background-color: #007bff; color: white; border: none; cursor: pointer; }
        button:hover { opacity: 0.9; }
    </style>
</head>
<body>
<div class="container">
    <h2>Make a Reservation</h2>
    <form method="post">
        <label for="user_id">User</label>
        <select name="user_id" id="user_id" required>
            <option value="">Select User</option>
            <?php
            $users = $conn->query("SELECT id, name FROM users");
            while ($user = $users->fetch_assoc()) {
                echo "<option value='".$user['id']."'>".$user['name']."</option>";
            }
            ?>
        </select>

        <label for="product_id">Product</label>
        <select name="product_id" id="product_id" required>
            <option value="">Select Product</option>
            <?php
            $products = $conn->query("SELECT id, name FROM products");
            while ($product = $products->fetch_assoc()) {
                echo "<option value='".$product['id']."'>".$product['name']."</option>";
            }
            ?>
        </select>

        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" name="quantity" required>
        
        <button type="submit" name="make_reservation">Make Reservation</button>
    </form>
</div>
</body>
</html>
<?php
$conn->close();
?>