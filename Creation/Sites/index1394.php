<?php
// Define database connection parameters
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'my_database');

// Connect to database
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($mysqli->connect_error) {
  die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Create table if not exists
$table = "CREATE TABLE IF NOT EXISTS orders (
          id INT AUTO_INCREMENT PRIMARY KEY,
          product VARCHAR(255) NOT NULL,
          dimensions VARCHAR(100) NOT NULL,
          quantity INT DEFAULT 1,
          status VARCHAR(50) DEFAULT 'pending',
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$mysqli->query($table)) {
  die('Error creating table: ' . $mysqli->error);
}

// Process form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
  $product = $mysqli->real_escape_string($_POST['product']);
  $dimensions = $mysqli->real_escape_string($_POST['dimensions']);
  $quantity = $mysqli->real_escape_string($_POST['quantity']);

  $insert = "INSERT INTO orders (product, dimensions, quantity) VALUES ('$product', '$dimensions', '$quantity')";

  if($mysqli->query($insert)) {
    echo "<p>Order successfully added!</p>";
  } else {
    echo "<p>Error adding order: " . $mysqli->error . "</p>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Order</title>
  <style>
    body { font-family: Arial, sans-serif; }
    form { max-width: 300px; margin: auto; }
    label, input { display: block; margin-bottom: 10px; }
    input[type="submit"] { background-color: #4CAF50; color: white; padding: 10px; border: none; cursor: pointer; }
    input[type="submit"]:hover { background-color: #45a049; }
  </style>
</head>
<body>
  <h2>Add a New Order</h2>
  <form action="" method="post">
    <label for="product">Product:</label>
    <input type="text" id="product" name="product" required>
    <label for="dimensions">Dimensions (e.g., 250x100 cm):</label>
    <input type="text" id="dimensions" name="dimensions" required>
    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" min="1" value="1">
    <input type="submit" name="submit" value="Add Order">
  </form>
</body>
</html>
<?php
$mysqli->close();
?>
