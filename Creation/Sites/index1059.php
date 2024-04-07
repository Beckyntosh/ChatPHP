<?php
// Simple Review and Rating System for a Home Decor website
// Connect to database
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

// Create tables if not exist
$sql = "CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_name VARCHAR(50) NOT NULL,
review TEXT NOT NULL,
rating INT(1) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_review'])) {
  $user_name = $_POST['user_name'];
  $review = $_POST['review'];
  $rating = $_POST['rating'];

  $stmt = $conn->prepare("INSERT INTO reviews (user_name, review, rating) VALUES (?, ?, ?)");
  $stmt->bind_param("ssi", $user_name, $review, $rating);

  if ($stmt->execute()) {
    echo "<script>alert('Review submitted successfully');</script>";
  } else {
    echo "<script>alert('Failed to submit the review');</script>";
  }
  
  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Home Decor Review System</title>
</head>
<body>
  <h2>Submit your review and rating</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
</body>
</html>
