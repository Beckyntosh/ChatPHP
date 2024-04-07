<?php
// Basic settings
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
$table_sql = "CREATE TABLE IF NOT EXISTS customer_reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  rating INT(1) NOT NULL,
  feedback TEXT DEFAULT NULL,
  review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($table_sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle Post request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $rating = $_POST['rating'];
  $feedback = $_POST['feedback'];

  $insert_sql = "INSERT INTO customer_reviews (rating, feedback) VALUES (?, ?)";

  // Prepare statement
  $stmt = $conn->prepare($insert_sql);
  $stmt->bind_param("is", $rating, $feedback);

  // execute the query
  if ($stmt->execute()) {
    echo "<p>Thank you for your feedback!</p>";
  } else {
    echo "<p>Error: " . $stmt->error . "</p>";
  }

  // Close statement
  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pet Supplies - Customer Service Rating</title>
<style>
  body {font-family: Arial, sans-serif;}
  form > div {
    margin-bottom: 15px;
  }
</style>
</head>
<body>

<h2>Rate Our Customer Service</h2>

<form action="" method="post">
  <div>
    <label for="rating">Rating (1 to 5):</label>
    <select name="rating" id="rating" required>
      <option value="1">1 - Poor</option>
      <option value="2">2 - Fair</option>
      <option value="3">3 - Good</option>
      <option value="4">4 - Very Good</option>
      <option value="5">5 - Excellent</option>
    </select>
  </div>
  <div>
    <label for="feedback">Feedback:</label>
    <textarea name="feedback" id="feedback" rows="4" placeholder="Share your experience with us"></textarea>
  </div>
  <div>
    <button type="submit">Submit Review</button>
  </div>
</form>

</body>
</html>
