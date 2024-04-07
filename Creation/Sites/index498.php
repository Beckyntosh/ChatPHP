<?php
// Assuming this file name is index.php and it's placed in the root directory of your server.
// Connect to the database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Try connecting to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS workout_log (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(255) NOT NULL,
    duration INT(10),
    intensity VARCHAR(50),
    log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) !== TRUE) {
  die("Error creating table: " . $conn->error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exerciseName = htmlspecialchars(strip_tags($_POST['exerciseName']));
    $duration = intval($_POST['duration']);
    $intensity = htmlspecialchars(strip_tags($_POST['intensity']));

    $stmt = $conn->prepare("INSERT INTO workout_log (exercise_name, duration, intensity) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $exerciseName, $duration, $intensity);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "<div>Record added successfully.</div>";
    } else {
        echo "<div>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Exercise to Digital Workout Log</title>
<style>
  body { font-family: Arial, sans-serif; background-color: #f0f0f0; margin: 2em; }
  form, div { margin: 1em 0; }
  label { display: block; margin-bottom: .5em; }
  input[type=text], input[type=number] { width: 100%; padding: .5em; margin-bottom: 1em; }
  input[type=submit] { padding: .5em 2em; }
  div { background-color: #e9ffd9; padding: 1em; border-radius: 5px; }
</style>
</head>
<body>
<h1>Log Exercise</h1>
<form action="index.php" method="post">
    <label for="exerciseName">Exercise Name:</label>
    <input type="text" id="exerciseName" name="exerciseName" required>
    
    <label for="duration">Duration (in minutes):</label>
    <input type="number" id="duration" name="duration" required>
    
    <label for="intensity">Intensity:</label>
    <input type="text" id="intensity" name="intensity" required>
    
    <input type="submit" value="Log Exercise">
</form>
</body>
</html>
