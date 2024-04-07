<?php
// Establish connection to the database
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

// Create reviews table if it doesn not exist
$sql = "CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
restaurant_name VARCHAR(50) NOT NULL,
reviewer_name VARCHAR(50),
quality_rating INT(1),
service_rating INT(1),
ambiance_rating INT(1),
comment TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo ""; // Successfully created table
} else {
  echo "Error creating table: " . $conn->error;
}

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $restaurant_name = $_POST['restaurant_name'];
    $reviewer_name = $_POST['reviewer_name'];
    $quality_rating = $_POST['quality_rating'];
    $service_rating = $_POST['service_rating'];
    $ambiance_rating = $_POST['ambiance_rating'];
    $comment = $_POST['comment'];
    
    $sql = "INSERT INTO reviews (restaurant_name, reviewer_name, quality_rating, service_rating, ambiance_rating, comment)
    VALUES ('$restaurant_name', '$reviewer_name', '$quality_rating', '$service_rating', '$ambiance_rating', '$comment')";
    
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
    <title>Restaurant Reviews</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        input[type=text], select, textarea { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; margin-top: 6px; margin-bottom: 16px; resize: vertical; }
        input[type=submit] { background-color: #4CAF50; color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="container">
  <h2>Submit a Restaurant Review</h2>
  <form method="post">
    <label for="restaurant_name">Restaurant Name</label>
    <input type="text" id="restaurant_name" name="restaurant_name" required>
    
    <label for="reviewer_name">Your Name</label>
    <input type="text" id="reviewer_name" name="reviewer_name">
    
    <label for="quality_rating">Food Quality Rating</label>
    <select id="quality_rating" name="quality_rating" required>
      <option value="1">1 - Poor</option>
      <option value="2">2</option>
      <option value="3">3 - Average</option>
      <option value="4">4</option>
      <option value="5">5 - Excellent</option>
    </select>
    
    <label for="service_rating">Service Rating</label>
    <select id="service_rating" name="service_rating" required>
      <option value="1">1 - Poor</option>
      <option value="2">2</option>
      <option value="3">3 - Average</option>
      <option value="4">4</option>
      <option value="5">5 - Excellent</option>
    </select>
    
    <label for="ambiance_rating">Ambiance Rating</label>
    <select id="ambiance_rating" name="ambiance_rating" required>
      <option value="1">1 - Poor</option>
      <option value="2">2</option>
      <option value="3">3 - Average</option>
      <option value="4">4</option>
      <option value="5">5 - Excellent</option>
    </select>
    
    <label for="comment">Comment</label>
    <textarea id="comment" name="comment" style="height:200px"></textarea>
    
    <input type="submit" value="Submit Review">
  </form>
</div>

</body>
</html>
