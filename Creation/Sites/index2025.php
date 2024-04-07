
<?php
// Database connection
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
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(30) NOT NULL,
    brand VARCHAR(30) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Products created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle Product Comparison Request
if(isset($_POST['compare'])) {
  $product1_id = $_POST['product1'];
  $product2_id = $_POST['product2'];

  $sql = "SELECT * FROM products WHERE id IN (?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $product1_id, $product2_id);
  $stmt->execute();
  $result = $stmt->get_result();

  $products = [];
  while($row = $result->fetch_assoc()) {
    $products[] = $row;
  }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Compare Pet Products</title>
    <style>
        /* Basic styles */
    </style>
</head>
<body>

<h2>Select Products to Compare</h2>

<form action="" method="post">
  Product 1:
  <select name="product1">
    <?php
    $sql = "SELECT id, product_name FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<option value=\"{$row['id']}\">{$row['product_name']}</option>";
      }
    }
    ?>
  </select>
  Product 2:
  <select name="product2">
    <?php
    $sql = "SELECT id, product_name FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<option value=\"{$row['id']}\">{$row['product_name']}</option>";
      }
    }
    ?>
  </select>
  <input type="submit" name="compare" value="Compare">
</form>

<?php
if(isset($products) && count($products) == 2) {
    // Display comparison details
    echo "<h2>Comparison</h2>";
    echo "<table border=\"1\">";
    echo "<tr><th>Feature</th><th>{$products[0]['product_name']}</th><th>{$products[1]['product_name']}</th></tr>";
    echo "<tr><td>Brand</td><td>{$products[0]['brand']}</td><td>{$products[1]['brand']}</td></tr>";
    echo "<tr><td>Price</td><td>{$products[0]['price']}</td><td>{$products[1]['price']}</td></tr>";
    echo "<tr><td>Description</td><td>{$products[0]['description']}</td><td>{$products[1]['description']}</td></tr>";
    echo "</table>";
}
?>

</body>
</html>

<?php
$conn->close();
?>

Remember, this script is oversimplified and doesn't follow best practices like separating concerns (e.g., using MVC architecture), sanitizing inputs, or implementing security measures against SQL injection beyond prepared statements. Depending on the use case, further development and adjustments are needed to ensure scalability, security, and performance.