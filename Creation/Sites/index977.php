<?php
// Simple Hotel Guest Review and Rating System
// Initialize MySQL connection
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

// Create table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS hotel_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    guest_name VARCHAR(30) NOT NULL,
    review TEXT NOT NULL,
    rating INT(1) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($tableSql)) {
  die("Error creating table: " . $conn->error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $guest_name = $_POST["guest_name"];
  $review = $_POST["review"];
  $rating = $_POST["rating"];

  $stmt = $conn->prepare("INSERT INTO hotel_reviews (guest_name, review, rating) VALUES (?, ?, ?)");
  $stmt->bind_param("ssi", $guest_name, $review, $rating);

  if ($stmt->execute()) {
    echo "<p>Review successfully added!</p>";
  } else {
    echo "<p>Error adding review: " . $stmt->error . "</p>";
  }

  $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hotel Review System</title>
  <style>
    body {font-family: Arial, sans-serif;}
    .container {max-width: 600px; margin: auto;}
    .review-form {margin-top: 20px;}
    .review-form label, .review-form input, .review-form textarea, .review-form button {display: block; width: 100%; margin-bottom: 10px;}
    .reviews {margin-top: 40px;}
    .review {border-bottom: 1px solid #ccc; padding: 10px 0;}
  </style>
</head>
<body>
<div class="container">
    <h1>Hotel Guest Review System</h1>
    <div class="review-form">
      <h2>Leave a Review</h2>
      <form action="" method="post">
        <label for="guest_name">Name:</label>
        <input type="text" id="guest_name" name="guest_name" required>
        
        <label for="review">Review:</label>
        <textarea id="review" name="review" required></textarea>
        
        <label for="rating">Rating:</label>
        <select id="rating" name="rating">
          <option value="1">1 Star</option>
          <option value="2">2 Stars</option>
          <option value="3">3 Stars</option>
          <option value="4">4 Stars</option>
          <option value="5">5 Stars</option>
        </select>
        
        <button type="submit">Submit Review</button>
      </form>
    </div>

    <div class="reviews">
      <h2>Reviews</h2>
      <?php
      $result = $conn->query("SELECT * FROM hotel_reviews ORDER BY reg_date DESC");

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<div class='review'>";
          echo "<h3>" . htmlentities($row["guest_name"]) . "</h3>";
          echo "<p>Rating: " . htmlentities($row["rating"]) . " Stars</p>";
          echo "<p>" . htmlentities($row["review"]) . "</p>";
          echo "<p>Reviewed on: " . $row["reg_date"] . "</p>";
          echo "</div>";
        }
      } else {
        echo "<p>No reviews yet.</p>";
      }
      $conn->close();
      ?>
    </div>
</div>
</body>
</html>
