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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS workout_log (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
exercise_type VARCHAR(30) NOT NULL,
duration_minutes INT NOT NULL,
intensity VARCHAR(30) NOT NULL,
log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $exercise_type = $_POST['exercise_type'];
  $duration = $_POST['duration'];
  $intensity = $_POST['intensity'];

  $sql = "INSERT INTO workout_log (exercise_type, duration_minutes, intensity) VALUES (?, ?, ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sis", $exercise_type, $duration, $intensity);

  if ($stmt->execute()) {
    echo "New record created successfully.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Exercise to Digital Workout Log</title>
</head>
<body>

<h2>Log New Exercise</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="exercise_type">Exercise Type:</label><br>
  <input type="text" id="exercise_type" name="exercise_type" required><br>
  <label for="duration">Duration (in minutes):</label><br>
  <input type="number" id="duration" name="duration" required><br>
  <label for="intensity">Intensity:</label><br>
  <select id="intensity" name="intensity">
    <option value="low">Low</option>
    <option value="moderate">Moderate</option>
    <option value="high">High</option>
  </select><br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>
