<?php
// Set up connection details
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
$createTable = <<<EOT
CREATE TABLE IF NOT EXISTS gadget_reviews (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(255) NOT NULL,
  review TEXT NOT NULL,
  rating INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)
EOT;

if (!$conn->query($createTable)) {
  die("Error creating table: " . $conn->error);
}

// Validate POST request and insert data
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
  $product_name = $_POST["product_name"];
  $review = $_POST["review"];
  $rating = $_POST["rating"];

  $stmt = $conn->prepare("INSERT INTO gadget_reviews (product_name, review, rating) VALUES (?, ?, ?)");
  $stmt->bind_param("ssi", $product_name, $review, $rating);

  if ($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gadget Review Portal</title>
</head>
<body>
<h1>Submit your Gadget Review</h1>
<form method="post" action="">
  <label for="product_name">Product Name:</label><br>
  <input type="text" id="product_name" name="product_name" required><br>

  <label for="review">Review:</label><br>
  <textarea id="review" name="review" required></textarea><br>

  <label for="rating">Rating:</label><br>
  <input type="number" id="rating" name="rating" min="1" max="5" required><br><br>

  <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
