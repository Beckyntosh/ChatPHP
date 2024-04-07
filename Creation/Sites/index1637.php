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

// Create table for Custom Exercises if not exists
$sql = "CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(30) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(100),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Custom Exercises created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exercise_name = $_POST['exercise_name'];
    $instructions = $_POST['instructions'];
    $video_url = $_POST['video_url'];

    $stmt = $conn->prepare("INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $exercise_name, $instructions, $video_url);

    if ($stmt->execute()) {
        echo "New exercise added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Custom Exercise</title>
</head>
<body>

<h2>Add a New Custom Exercise</h2>

<form method="POST" action="">
  <label for="exercise_name">Exercise Name:</label><br>
  <input type="text" id="exercise_name" name="exercise_name" required><br>
  <label for="instructions">Instructions:</label><br>
  <textarea id="instructions" name="instructions" required></textarea><br>
  <label for="video_url">Video URL:</label><br>
  <input type="text" id="video_url" name="video_url"><br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
