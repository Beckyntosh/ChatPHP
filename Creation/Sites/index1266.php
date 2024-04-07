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

// Create exercise log table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS exercise_log (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  exercise_name VARCHAR(50) NOT NULL,
  duration INT(10),
  intensity VARCHAR(30),
  log_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($createTable) === TRUE) {
  echo "Table exercise_log created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $exercise_name = $_POST['exercise_name'];
  $duration = $_POST['duration'];
  $intensity = $_POST['intensity'];

  // Insert the log into the database
  $sql = "INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES ('$exercise_name', '$duration', '$intensity')";

  if ($conn->query($sql) === TRUE) {
    echo "<br>New record created successfully";
  } else {
    echo "<br>Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Exercise to Digital Workout Log</title>
</head>
<body>

<h2>Log a New Exercise</h2>

<form method="post">
  <label for="exercise_name">Exercise Name:</label><br>
  <input type="text" id="exercise_name" name="exercise_name" required><br>
  <label for="duration">Duration (minutes):</label><br>
  <input type="number" id="duration" name="duration" required><br>
  <label for="intensity">Intensity:</label><br>
  <select id="intensity" name="intensity" required>
    <option value="low">Low</option>
    <option value="moderate">Moderate</option>
    <option value="high">High</option>
  </select><br><br>
  <input type="submit" value="Log Exercise">
</form>

</body>
</html>
