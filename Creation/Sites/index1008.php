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

// Create table if it does not exist
$table = "CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    review TEXT NOT NULL,
    rating INT NOT NULL,
    submit_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Insert review
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $product_name = $conn->real_escape_string($_POST['product_name']);
  $review = $conn->real_escape_string($_POST['review']);
  $rating = $conn->real_escape_string($_POST['rating']);

  $sql = "INSERT INTO reviews (product_name, review, rating) VALUES ('$product_name', '$review', '$rating')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gadget Review Portal</title>
</head>
<body>
<h1>Submit Your Gadget Review</h1>

<form action="?" method="post">
    <label for="product_name">Gadget Name:</label><br>
    <input type="text" id="product_name" name="product_name" required><br>
    <label for="review">Your Review:</label><br>
    <textarea id="review" name="review" required></textarea><br>
    <label for="rating">Rating (1-5):</label><br>
    <select id="rating" name="rating" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select><br><br>
    <input type="submit" value="Submit Review">
</form>
</body>
</html>
