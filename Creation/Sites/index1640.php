<?php
// Define MySQL connection
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

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $exerciseName = $_POST['exerciseName'];
  $instructions = $_POST['instructions'];
  $videoURL = $_POST['videoURL'];

  // Prepare and bind
  $stmt = $conn->prepare("INSERT INTO custom_exercises (name, instructions, video_url) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $exerciseName, $instructions, $videoURL);
  
  // Execute the statement
  if($stmt->execute()) {
    echo "New exercise added successfully";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
}

// Create custom_exercises table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS custom_exercises (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
instructions TEXT NOT NULL,
video_url VARCHAR(255) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Custom Exercise</title>
</head>
<body>

<h2>Add Custom Exercise to Fitness App</h2>

<form method="post">
  <label for="exerciseName">Exercise Name:</label><br>
  <input type="text" id="exerciseName" name="exerciseName" required><br>
  
  <label for="instructions">Instructions:</label><br>
  <textarea id="instructions" name="instructions" required></textarea><br>
  
  <label for="videoURL">Video URL:</label><br>
  <input type="text" id="videoURL" name="videoURL" required><br><br>
  
  <input type="submit" value="Add Exercise">
</form> 

</body>
</html>
