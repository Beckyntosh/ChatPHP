<?php
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

// Create feedback table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS service_feedback (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  service_rating INT(1) NOT NULL,
  comment TEXT,
  submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Insert new feedback
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $service_rating = $_POST['service_rating'];
  $comment = $_POST['comment'];

  $stmt = $conn->prepare("INSERT INTO service_feedback (service_rating, comment) VALUES (?, ?)");
  $stmt->bind_param("is", $service_rating, $comment);
  
  if ($stmt->execute()) {
    echo "Feedback successfully submitted";
  } else {
    echo "Error submitting feedback: " . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Service Feedback Form</title>
</head>
<body>
  <h1>Herbal Supplements Service Feedback</h1>
  <form action="" method="post">
    <label for="service_rating">Rate our service (1-5):</label>
    <input type="number" id="service_rating" name="service_rating" min="1" max="5" required>
    <br>
    <label for="comment">Comment:</label>
    <textarea id="comment" name="comment"></textarea>
    <br>
    <input type="submit" value="Submit Feedback">
  </form>
</body>
</html>
