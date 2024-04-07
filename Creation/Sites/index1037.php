<?php
// Simple Product Review & Rating System for a Handbags Website
// Database Connection
$servername = 'db';
$username = 'root';
$password = 'root';
$dbname = 'my_database';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Creating tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  description TEXT NOT NULL,
  reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_id INT(6) UNSIGNED,
  user_name VARCHAR(30) NOT NULL,
  review TEXT NOT NULL,
  rating INT(1),
  reg_date TIMESTAMP,
  FOREIGN KEY (product_id) REFERENCES products(id)
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Inserting a new review
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_review"])) {
  $product_id = $_POST["product_id"];
  $user_name = $_POST["user_name"];
  $review = $_POST["review"];
  $rating = $_POST["rating"];

  $sql = "INSERT INTO reviews (product_id, user_name, review, rating) VALUES ('$product_id', '$user_name', '$review', '$rating')";
  
  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Review submitted successfully');</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Handbag Reviews</title>
<style>
  body { font-family: Arial, sans-serif; }
  .container { max-width: 800px; margin: auto; }
  .review { border-bottom: 1px solid #ccc; padding: 20px; }
  .rating { color: gold; }
  input[type="text"], textarea { width: 100%; padding: 10px; margin: 5px 0; }
  input[type="submit"] { padding: 10px 20px; background: blue; color: white; border: none; cursor: pointer; }
</style>
</head>
<body>

<div class="container">
<h2>Product Reviews</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
Assuming a single product for simplicity
  <label for="user_name">Name:</label><br>
  <input type="text" id="user_name" name="user_name" required><br>
  
  <label for="review">Review:</label><br>
  <textarea id="review" name="review" required></textarea><br>
  
  <label for="rating">Rating:</label><br>
  <select id="rating" name="rating">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select><br><br>
  
  <input type="submit" name="submit_review" value="Submit Review">
</form>

<?php
// Fetch and display reviews
$sql = "SELECT user_name, review, rating FROM reviews WHERE product_id = 1 ORDER BY reg_date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<div class='review'><p><strong>" . htmlspecialchars($row["user_name"]) . "</strong></p><p>" . htmlspecialchars($row["review"]) . "</p><p class='rating'>Rating: " . str_repeat("★", $row["rating"]) . "</p></div>";
  }
} else {
  echo "0 reviews";
}
$conn->close();
?>
</div>

</body>
</html>
