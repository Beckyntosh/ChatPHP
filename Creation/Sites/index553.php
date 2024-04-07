<?php
// Database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if wish list table exists, if not create it
$createWishlistTable = "CREATE TABLE IF NOT EXISTS wishlist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);";

// Execute query
if (!$conn->query($createWishlistTable)) {
  echo "Error creating table: " . $conn->error;
}

// Add to Wishlist functionality
if (isset($_POST['add_to_wishlist'])) {
  $userId = $_POST['user_id']; // Assume we have the user's ID from session or form
  $productId = $_POST['product_id']; // Assume this comes from the form
  
  $addWishlist = $conn->prepare("INSERT INTO wishlist (user_id, product_id) VALUES (?, ?)");
  $addWishlist->bind_param("ii", $userId, $productId);
  if ($addWishlist->execute()) {
    echo "<div style='color: green;'>Added to Wishlist!</div>";
  } else {
    echo "<div style='color: red;'>Error: " . $conn->error . "</div>";
  }
}

// Fetching products
$fetchProducts = "SELECT * FROM products";
$result = $conn->query($fetchProducts);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Musical Instruments Showcase</title>
  <style>
    body {
      background-color: #121212;
      color: #00ff00;
      font-family: Arial, sans-serif;
    }
    .product-container {
      display: flex;
      flex-wrap: wrap;
    }
    .product {
      background-color: #333;
      margin: 10px;
      padding: 20px;
      border-radius: 10px;
      width: 30%;
    }
    button {
      background-color: #008CBA; /* Blue */
      color: white;
      padding: 10px 24px;
      cursor: pointer;
      border: none;
      border-radius: 5px;
    }
    button:hover {
      background-color: #009CDA;
    }
  </style>
</head>
<body>
  <h1>Musical Instruments Photography Showcase</h1>
  <div class="product-container">
    <?php while($product = $result->fetch_assoc()): ?>
      <div class="product">
        <h3><?= htmlspecialchars($product['name']) ?></h3>
        <p><?= nl2br(htmlspecialchars($product['description'])) ?></p>
        <p>Category: <?= htmlspecialchars($product['category']) ?></p>
        <p>Price: $<?= htmlspecialchars($product['price']) ?></p>
        <form method="POST">
          <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
Assume user_id is 1 for demonstration
          <button type="submit" name="add_to_wishlist">Add to Wishlist</button>
        </form>
      </div>
    <?php endwhile; ?>
  </div>
</body>
</html>
<?php
$conn->close();
?>