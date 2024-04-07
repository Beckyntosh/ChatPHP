<?php
// Database configuration
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

// Create destinations table if it doesn't exist
$createDestinationsTable = "CREATE TABLE IF NOT EXISTS destinations (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  destination_name VARCHAR(30) NOT NULL,
  location VARCHAR(50),
  description TEXT,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($createDestinationsTable) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Create reviews table if it doesn't exist
$createReviewsTable = "CREATE TABLE IF NOT EXISTS reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  destination_id INT(6) UNSIGNED,
  author VARCHAR(30) NOT NULL,
  review TEXT,
  rating INT(1),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (destination_id) REFERENCES destinations(id)
)";

if ($conn->query($createReviewsTable) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Form submission logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $destination_name = $_POST['destination_name'];
  $location = $_POST['location'];
  $description = $_POST['description'];
  // Insert destination
  $sql = "INSERT INTO destinations (destination_name, location, description) VALUES ('$destination_name', '$location', '$description')";
  
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Travel Destination Reviews</title>
  <style>
    body {font-family: Arial, sans-serif;}
    .container {width: 80%; margin: auto; overflow: hidden;}
    header {background: #50a3a2; color: white; padding-top: 30px; min-height: 70px; border-bottom: 1px solid #eeeeee;}
    footer {background: #50a3a2; color: white; text-align: center; padding: 5px; margin-top: 20px;}
    input[type=text], textarea {width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box;}
    input[type=submit] {background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%;}
  </style>
</head>
<body>

<div class="container">
  <header>
    <h1>Submit Your Travel Experience</h1>
  </header>
  
  <form action="" method="post">
    <label for="destination_name">Destination Name:</label>
    <input type="text" id="destination_name" name="destination_name" required>
    
    <label for="location">Location:</label>
    <input type="text" id="location" name="location" required>
    
    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea>
    
    <input type="submit" value="Submit">
  </form>
</div>

<footer>
  <p>Travel Destination Reviews © 2023</p>
</footer>

</body>
</html>

<?php
$conn->close();
?>
