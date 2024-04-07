<?php
// Simple Gadget Review and Rating Portal in PHP and MySQL

// MySQL connection settings
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
$reviewsTable = "CREATE TABLE IF NOT EXISTS reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(255) NOT NULL,
  review TEXT NOT NULL,
  rating INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($reviewsTable) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Insert review
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $product_name = $_POST['product_name'];
  $review = $_POST['review'];
  $rating = $_POST['rating'];

  $insertSQL = "INSERT INTO reviews (product_name, review, rating) VALUES (?, ?, ?)";

  $stmt = $conn->prepare($insertSQL);
  $stmt->bind_param("ssi", $product_name, $review, $rating);

  if ($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Gadget Review and Rating Portal</title>
</head>
<body>

<h2>Submit Gadget Review</h2>
<form method="POST">
  <label for="product_name">Product Name:</label><br>
  <input type="text" id="product_name" name="product_name" required><br>
  <label for="review">Review:</label><br>
  <textarea id="review" name="review" required></textarea><br>
  <label for="rating">Rating (1-5):</label><br>
  <input type="number" id="rating" name="rating" min="1" max="5" required><br><br>
  <input type="submit" value="Submit Review">
</form> 

<h2>Recent Reviews</h2>
<?php
$sql = "SELECT product_name, review, rating FROM reviews ORDER BY created_at DESC LIMIT 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<p><strong>" . $row["product_name"]. "</strong> - Rating: " . $row["rating"]. "/5 <br>" . $row["review"]. "</p>";
  }
} else {
  echo "No reviews yet.";
}
$conn->close();
?>

</body>
</html>
