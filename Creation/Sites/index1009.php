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

// Create tables if they do not exist
$reviewTableSql = "CREATE TABLE IF NOT EXISTS reviews (
  id INT AUTO_INCREMENT PRIMARY KEY,
  gadget_name VARCHAR(255) NOT NULL,
  review TEXT NOT NULL,
  rating DECIMAL(2,1) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($reviewTableSql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

function addReview($conn, $gadget_name, $review, $rating) {
  $stmt = $conn->prepare("INSERT INTO reviews (gadget_name, review, rating) VALUES (?, ?, ?)");
  $stmt->bind_param("ssd", $gadget_name, $review, $rating);
  
  return $stmt->execute();
}

function getReviews($conn) {
  $sql = "SELECT * FROM reviews ORDER BY created_at DESC";
  $result = $conn->query($sql);
  return $result;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $gadget_name = htmlspecialchars($_POST['gadget_name']);
  $review = htmlspecialchars($_POST['review']);
  $rating = htmlspecialchars($_POST['rating']);

  if(addReview($conn, $gadget_name, $review, (float)$rating)) {
    echo "<h3>Review added successfully.</h3>";
  } else {
    echo "<h3>Failed to add review.</h3>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gadget Review Portal</title>
</head>
<body>
<h2>Submit Your Review</h2>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    Gadget Name: <input type="text" name="gadget_name" required><br><br>
    Review: <textarea name="review" required></textarea><br><br>
    Rating: <select name="rating" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select> <br><br>
    <input type="submit" value="Submit Review">
</form>

<h2>Latest Reviews</h2>
<div>
<?php
$reviews = getReviews($conn);
if ($reviews->num_rows > 0) {
  while($row = $reviews->fetch_assoc()) {
    echo "<div style='margin: 20px; padding: 10px; border: 1px solid #ddd;'>";
    echo "<h4>" . htmlspecialchars($row["gadget_name"]) . " - " . htmlspecialchars($row["rating"]) . "/5 stars</h4>";
    echo "<p>" . nl2br(htmlspecialchars($row["review"])) . "</p>";
    echo "<span>Reviewed on: " . $row["created_at"] . "</span>";
    echo "</div>";
  }
} else {
  echo "0 reviews found.";
}
$conn->close();
?>
</div>
</body>
</html>
