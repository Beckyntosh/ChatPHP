<?php

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
$createTablesSql = "CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT,
  image VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS reviews (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product_id INT,
  rating INT NOT NULL,
  comment TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (product_id) REFERENCES products(id)
);";

if ($conn->multi_query($createTablesSql)) {
  do {
    // store first result set
    if ($result = $conn->store_result()) {
      $result->free();
    }
  } while ($conn->next_result());
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $product_id = $_POST["product_id"];
  $rating = $_POST["rating"];
  $comment = $_POST["comment"];

  // Insert review into the database
  $stmt = $conn->prepare("INSERT INTO reviews (product_id, rating, comment) VALUES (?, ?, ?)");
  $stmt->bind_param("iis", $product_id, $rating, $comment);
  $stmt->execute();
  $stmt->close();
}

// Retrieve products
$productsSql = "SELECT * FROM products";
$productsResult = $conn->query($productsSql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Makeup Webshop Reviews</title>
<style>
  body { font-family: Arial, sans-serif; background-color: #ffc0cb; color: #333; }
  .product { margin-bottom: 40px; }
  .product img { max-width: 100px; max-height: 100px; }
  .review-form { margin-top: 20px; }
  .review { background-color: #f0e68c; padding: 10px; margin-top: 10px; }
</style>
</head>
<body>
<h1>Welcome to Our Happy Makeup Webshop!</h1>
<?php while($product = $productsResult->fetch_assoc()): ?>
  <div class="product">
    <h2><?= htmlspecialchars($product['name']) ?></h2>
    <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
    <p><?= htmlspecialchars($product['description']) ?></p>
    <div class="review-form">
      <form action="" method="POST">
        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
        <label for="rating">Rating:</label>
        <select name="rating" required>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
        <br>
        <label for="comment">Comment:</label>
        <textarea name="comment" required></textarea>
        <br>
        <button type="submit">Submit Review</button>
      </form>
    </div>
    <?php
    $reviewsSql = "SELECT * FROM reviews WHERE product_id = " . $product['id'];
    $reviewsResult = $conn->query($reviewsSql);
    while($review = $reviewsResult->fetch_assoc()): ?>
      <div class="review">
        <p>Rating: <?= $review['rating'] ?></p>
        <p><?= htmlspecialchars($review['comment']) ?></p>
        <p>Posted on: <?= $review['created_at'] ?></p>
      </div>
    <?php endwhile; ?>
  </div>
<?php endwhile; ?>

</body>
</html>

<?php
$conn->close();
?>
