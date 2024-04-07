<?php

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

// Creating exercise table if it does not exist
$sqlExerciseTable = "CREATE TABLE IF NOT EXISTS custom_exercises (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
exercise_name VARCHAR(50) NOT NULL,
instructions TEXT NOT NULL,
video_url VARCHAR(255),
reg_date TIMESTAMP
)";

if ($conn->query($sqlExerciseTable) === TRUE) {
  //echo "Table custom_exercises created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handling form data and inserting into the database
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addExercise'])) {
  $exercise_name = htmlspecialchars($_POST['exercise_name']);
  $instructions = htmlspecialchars($_POST['instructions']);
  $video_url = htmlspecialchars($_POST['video_url']);

  $stmt = $conn->prepare("INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $exercise_name, $instructions, $video_url);
  
  if ($stmt->execute() === TRUE) {
    echo "<script>alert('New exercise added successfully!');</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Custom Exercise</title>
</head>
<body>

<h2>Add Custom Exercise to Your Fitness App</h2>

<form action="" method="post">
  <label for="exercise_name">Exercise Name:</label><br>
  <input type="text" id="exercise_name" name="exercise_name" required><br>
  
  <label for="instructions">Instructions:</label><br>
  <textarea id="instructions" name="instructions" required></textarea><br>
  
  <label for="video_url">Video URL:</label><br>
  <input type="url" id="video_url" name="video_url"><br><br>
  
  <input type="submit" name="addExercise" value="Submit">
</form> 

</body>
</html>

<?php
$conn->close();
?>