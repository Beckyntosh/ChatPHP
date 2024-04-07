<?php
// Establish Connection to the database
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
$table_sql = "CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(255) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(255),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($table_sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle the Post request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $exercise_name = $_POST['exercise_name'];
  $instructions = $_POST['instructions'];
  $video_url = $_POST['video_url'];

  $insert_sql = "INSERT INTO custom_exercises (exercise_name, instructions, video_url)
  VALUES ('" . $exercise_name . "', '" . $instructions . "', '" . $video_url . "')";

  if ($conn->query($insert_sql) === TRUE) {
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
    <title>Add Custom Exercise</title>
</head>
<body>
    <h2>Add Custom Exercise to Fitness App</h2>
    <form method="POST">
        <label for="exercise_name">Exercise Name:</label><br>
        <input type="text" id="exercise_name" name="exercise_name" required><br>
        
        <label for="instructions">Instructions:</label><br>
        <textarea id="instructions" name="instructions" required></textarea><br>
        
        <label for="video_url">Video URL (optional):</label><br>
        <input type="text" id="video_url" name="video_url"><br>
        
        <input type="submit" value="Add Exercise">
    </form>
</body>
</html>
