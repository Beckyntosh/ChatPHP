<?php
// Database Connection
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

// Create reviews table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS product_reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_id INT(6) NOT NULL,
  user_name VARCHAR(50),
  rating INT(1),
  review TEXT,
  review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $product_id = htmlspecialchars($_POST['product_id']);
  $user_name = htmlspecialchars($_POST['user_name']);
  $rating = htmlspecialchars($_POST['rating']);
  $review = htmlspecialchars($_POST['review']);

  $stmt = $conn->prepare("INSERT INTO product_reviews (product_id, user_name, rating, review) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("isss", $product_id, $user_name, $rating, $review);

  if($stmt->execute()){
    echo "Review submitted successfully.";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Product Review System</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f0f8ff;
    color: #333;
    line-height: 1.6;
  }
  .container {
    width: 80%;
    margin: 0 auto;
  }
  .review-form {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  input[type="text"], textarea {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 4px;
  }
  input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  input[type="submit"]:hover {
    background-color: #45a049;
  }
</style>
</head>
<body>
<div class="container">
  <h2>Leave a Product Review</h2>
  <form class="review-form" action="" method="post">
Static value for demo. In a real scenario, this should be dynamic
    <label for="user_name">Name:</label>
    <input type="text" id="user_name" name="user_name" required>

    <label for="rating">Rating (1-5):</label>
    <input type="number" id="rating" name="rating" min="1" max="5" required>
    
    <label for="review">Review:</label>
    <textarea id="review" name="review" rows="4" required></textarea>
    
    <input type="submit" value="Submit Review">
  </form>
</div>
</body>
</html>
