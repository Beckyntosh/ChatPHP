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

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
rating INT(1) NOT NULL,
review TEXT NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table reviews created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $rating = intval($_POST["rating"]);
  $review = $_POST["review"];

  $stmt = $conn->prepare("INSERT INTO reviews (rating, review) VALUES (?, ?)");
  $stmt->bind_param("is", $rating, $review);

  if ($stmt->execute() === TRUE) {
    echo "<p>Thank you for your review!</p>";
  } else {
    echo "<p>Sorry, there was an error saving your review.</p>";
  }

  $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Leave a Review</title>
<style>
  body { font-family: Arial, sans-serif; }
  form { margin-top: 20px; }
  label { display: block; margin: 10px 0; }
  textarea { width: 100%; height: 100px; }
</style>
</head>
<body>
<h2>Leave a Review for Our Vinyl Records</h2>
<form action="" method="post">
  <label for="rating">Rating (1-5):</label>
  <select name="rating" id="rating" required>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select>
  <label for="review">Review:</label>
  <textarea name="review" id="review" required></textarea>
  <input type="submit" value="Submit Review">
</form>
</body>
</html>
<?php
$conn->close();
?>
