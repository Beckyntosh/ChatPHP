<?php
// Database connection settings
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to the MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $destination = $_POST['destination'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];
    
    // Check if the fields are empty
    if (!empty($destination) && !empty($review) && !empty($rating)) {
        
        // Prepare an insert statement
        $sql = "INSERT INTO reviews (destination, review, rating) VALUES (?, ?, ?)";
         
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssi", $param_destination, $param_review, $param_rating);
            
            // Set parameters
            $param_destination = $destination;
            $param_review = $review;
            $param_rating = $rating;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                echo "Review successfully saved.";
            } else{
                echo "Something went wrong. Please try again later.";
            }
            // Close statement
            $stmt->close();
        }
    }
    
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Destination Reviews</title>
    <style>
        body {font-family: Arial, sans-serif; background-color: #f0f0f0; margin: 20px;}
        .container {background-color: #ffffff; padding: 20px; border-radius: 5px;}
        h2 {color: #383838;}
        form {margin-top: 20px;}
        input, textarea {width: 100%; padding: 10px; margin: 10px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;}
        input[type=submit] {background-color: #4CAF50; color: white; cursor: pointer;}
        input[type=submit]:hover {background-color: #45a049;}
    </style>
</head>
<body>
<div class="container">
  <h2>Share Your Travel Experience</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="destination">Destination</label>
    <input type="text" id="destination" name="destination" placeholder="Destination name...">
    
    <label for="review">Review</label>
    <textarea id="review" name="review" placeholder="Write something..." style="height:200px"></textarea>
    
    <label for="rating">Rating</label>
    <input type="number" id="rating" name="rating" min="1" max="5">
    
    <input type="submit" value="Submit Review">
  </form>
</div>
</body>
</html>

<?php

// Create table if it doesn't exist
$createTableSql = "CREATE TABLE IF NOT EXISTS reviews (
  id INT AUTO_INCREMENT PRIMARY KEY,
  destination VARCHAR(255) NOT NULL,
  review TEXT NOT NULL,
  rating INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

if (!$conn->query($createTableSql)) {
    echo "Error creating table: " . $conn->error;
}

?>
