<?php
// Setup connection variables
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

// Create tables if they do not exist
$createTableSql = "
CREATE TABLE IF NOT EXISTS cart (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) NOT NULL,
    product_details VARCHAR(255) NOT NULL,
    saved_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE
);
";

if ($conn->multi_query($createTableSql)) {
  do {
    // Prepare next result set
  } while ($conn->more_results() && $conn->next_result());
}

// Form processing
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveCart'])) {
  $userId = $_POST['userId'];
  $productDetails = json_encode($_POST['productDetails']);
  
  $stmt = $conn->prepare("INSERT INTO cart (user_id, product_details) VALUES (?, ?)");
  $stmt->bind_param("is", $userId, $productDetails);
  
  if ($stmt->execute()) {
    echo "<p>Cart saved successfully!</p>";
  } else {
    echo "<p>Error saving cart!</p>";
  }
  
  $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <style>
        body {font-family: 'Courier New', monospace; background-color: #f0f8ff; color: #024; padding: 20px;}
        .product {background-color: #fff; border-radius: 5px; padding: 10px; margin-bottom: 5px;}
    </style>
</head>
<body>
    <h2>Ada's School Supplies - Shopping Cart</h2>
    <form method="post">
        <label for="userId">User ID:</label>
        <input type="text" id="userId" name="userId" required>
        <div class="product">
            <div><strong>Product Details (JSON):</strong></div>
            <textarea name="productDetails" rows="5" required>[{"product":"Pencils","qty":3},{"product":"Notebooks","qty":5}]</textarea>
        </div>
        <button type="submit" name="saveCart">Save Cart</button>
    </form>

    <?php
    // Retrieve carts logic
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['retrieveCarts'])) {
        $userId = $_GET['userId'];
        $stmt = $conn->prepare("SELECT product_details FROM cart WHERE user_id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            echo "<h3>Saved Cart Items:</h3>";
            while ($row = $result->fetch_assoc()) {
                $productDetails = json_decode($row['product_details'], true);
                foreach ($productDetails as $product) {
                    echo "<div class='product'><strong>Product:</strong> " . $product['product'] . "; <strong>Quantity:</strong> " . $product['qty'] . "</div>";
                }
            }
        } else {
            echo "<p>No carts found.</p>";
        }
        
        $stmt->close();
    }
    ?>

    <form method="get">
        <label for="userId">User ID to Retrieve Carts:</label>
        <input type="text" id="userId" name="userId" required>
        <button type="submit" name="retrieveCarts">Retrieve Carts</button>
    </form>
</body>
</html>
<?php
$conn->close();
?>