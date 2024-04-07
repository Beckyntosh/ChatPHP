<?php
// This script is a simplistic example of a feedback system for service ratings, such as might be used for a video games website.
// It includes both the frontend for user inputs and the backend to handle the data, all in one file.
// Note: In a production environment, separating concerns and utilizing proper security measures is critical.

// INSERT YOUR ACTUAL DATABASE CONNECTION INFO HERE
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

// Creating the feedback table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS service_feedback (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  service_name VARCHAR(255) NOT NULL,
  user_name VARCHAR(255),
  rating INT(1),
  review TEXT,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handling the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $service_name = $conn->real_escape_string($_POST['service_name']);
  $user_name = $conn->real_escape_string($_POST['user_name']);
  $rating = $conn->real_escape_string($_POST['rating']);
  $review = $conn->real_escape_string($_POST['review']);
  
  $sql = "INSERT INTO service_feedback (service_name, user_name, rating, review)
  VALUES ('$service_name', '$user_name', '$rating', '$review')";

  if ($conn->query($sql) === TRUE) {
    echo '<script>alert("New record created successfully");</script>';
  } else {
    echo '<script>alert("Error: ' . $sql . ' ' . $conn->error.'");</script>';
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Service Feedback Form</title>
  <style>
    body { font-family: Arial, sans-serif; }
    .container { max-width: 600px; margin: 20px auto; padding: 20px; }
    label, input, textarea { display: block; width: 100%; margin-bottom: 10px; }
    input, textarea { padding: 10px; }
    button { padding: 10px 20px; }
  </style>
</head>
<body>

<div class="container">
  <h2>Service Feedback Form</h2>
  <form action="" method="post">
    <label for="service_name">Service Name:</label>
    <input type="text" id="service_name" name="service_name" required>
    
    <label for="user_name">Your Name:</label>
    <input type="text" id="user_name" name="user_name" required>
    
    <label for="rating">Rating (1-5):</label>
    <input type="number" id="rating" name="rating" min="1" max="5" required>
    
    <label for="review">Review:</label>
    <textarea id="review" name="review" rows="4" required></textarea>
    
    <button type="submit">Submit</button>
  </form>
</div>

</body>
</html>
