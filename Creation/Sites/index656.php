<?php

// Database configuration
$host = 'db';
$dbname = 'my_database';
$username = 'root';
$password = 'root';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create reviews table if it doesn't exist
$createReviewsTable = "CREATE TABLE IF NOT EXISTS reviews (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  product_id INT,
  rating INT,
  comment TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (product_id) REFERENCES products(id)
);";

if ($conn->query($createReviewsTable) === FALSE) {
  echo "Error creating table: " . $conn->error;
}

// Handle post request to add review
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_review'])) {
  $user_id = $_POST['user_id'];
  $product_id = $_POST['product_id'];
  $rating = $_POST['rating'];
  $comment = $_POST['comment'];
  
  $insertReview = $conn->prepare("INSERT INTO reviews (user_id, product_id, rating, comment) VALUES (?, ?, ?, ?)");
  $insertReview->bind_param("iiis", $user_id, $product_id, $rating, $comment);
  
  if($insertReview->execute()) {
    echo "<div>Review Added Successfully!</div>";
  } else {
    echo "<div>Error Adding Review: {$conn->error}</div>";
  }
  
  $insertReview->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Heritage Haven - Wine & Gadget Reviews</title>
  <style>
    body {
      background-color: #f4f2ef;
      font-family: 'Times New Roman', Times, serif;
    }
    .container {
      width: 80%;
      margin: auto;
      overflow: hidden;
    }
    header {
      background: #8a5a44;
      color: #ffffff;
      padding-top: 30px;
      min-height: 70px;
      border-bottom: #076ea0 3px solid;
    }
    header h1 {
      text-align: center;
      margin: 0;
      padding-bottom: 10px;
    }
    form {
      background-color: #e7ddb0;
      padding: 20px;
      margin-top: 20px;
    }
    input[type="text"], input[type="email"], textarea, select {
      width: 100%;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <header>
    <div class="container">
      <h1>Heritage Haven - Share Your Review</h1>
    </div>
  </header>
  
  <div class="container">
    <form action="" method="post">
      <label for="user_id">User ID:</label><br>
      <input type="text" id="user_id" name="user_id" required><br>
      <label for="product_id">Product ID:</label><br>
      <input type="text" id="product_id" name="product_id" required><br>
      <label for="rating">Rating:</label><br>
      <select id="rating" name="rating">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select><br>
      <label for="comment">Comment:</label><br>
      <textarea id="comment" name="comment" rows="4" required></textarea><br>
      <input type="submit" name="submit_review" value="Submit Review">
    </form>
  </div>
</body>
</html>