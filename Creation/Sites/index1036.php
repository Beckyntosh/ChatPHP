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

// Create tables if they don't exist
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_id INT(6) UNSIGNED,
    user VARCHAR(50) NOT NULL,
    rating INT(1),
    comment TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id)
    )";

$conn->query($sql);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addReview'])) {
  $product_id = intval($_POST['product_id']);
  $user = $_POST['user'];
  $rating = intval($_POST['rating']);
  $comment = $_POST['comment'];

  $stmt = $conn->prepare("INSERT INTO reviews (product_id, user, rating, comment) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("isis", $product_id, $user, $rating, $comment);
  
  if($stmt->execute()) {
    echo "Review added successfully!";
  } else {
    echo "Error adding review: " . $conn->error;
  }

  $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Reviews</title>
</head>
<body>
<h2>Products</h2>
<ul>
  <?php
  $sql = "SELECT id, name FROM products";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<li>" . $row["name"] . " - <a href='?product_id=" . $row["id"] . "#reviews'>View Reviews</a></li>";
    }
  } else {
    echo "No products found";
  }
  ?>
</ul>

<?php
if (isset($_GET['product_id'])) {
  $product_id = intval($_GET['product_id']);
  
  echo "<h2>Reviews</h2>";
  echo "<div id='reviews'>";
  $sql = "SELECT user, rating, comment, reg_date FROM reviews WHERE product_id=$product_id";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<p>" . htmlspecialchars($row["user"]) . " - Rating: " . $row["rating"] . "<br>" . htmlspecialchars($row["comment"]) . "</p>";
    }
  } else {
    echo "No reviews yet";
  }
  echo "</div>";

?>
<h3>Add Review</h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
    <label for="user">Name:</label>
    <input type="text" id="user" name="user" required><br><br>
    <label for="rating">Rating:</label>
    <select id="rating" name="rating" required>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select><br><br>
    <label for="comment">Comment:</label><br>
    <textarea id="comment" name="comment" rows="4" cols="50" required></textarea><br><br>
    <input type="submit" name="addReview" value="Submit">
</form>
<?php
} // Close the if product_id is set
$conn->close();
?>

</body>
</html>
