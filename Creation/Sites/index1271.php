<?php

// Connect to database
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

// Create exercise log table if not exists
$sql = "CREATE TABLE IF NOT EXISTS exercise_log (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
exercise_name VARCHAR(30) NOT NULL,
duration INT(10),
intensity VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table creation success
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $exercise_name = $_POST['exercise_name'];
  $duration = $_POST['duration'];
  $intensity = $_POST['intensity'];

  $query = $conn->prepare("INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES (?, ?, ?)");
  $query->bind_param("sis", $exercise_name, $duration, $intensity);

  if($query->execute()) {
    echo "Exercise logged successfully!";
  } else {
    echo "Error logging exercise: " . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Exercise to Digital Workout Log</title>
</head>
<body>
<h2>Log Your Exercise</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="exercise_name">Exercise Name:</label><br>
  <input type="text" id="exercise_name" name="exercise_name" required><br>
  <label for="duration">Duration (in minutes):</label><br>
  <input type="number" id="duration" name="duration" required><br>
  <label for="intensity">Intensity:</label><br>
  <select id="intensity" name="intensity">
    <option value="low">Low</option>
    <option value="moderate">Moderate</option>
    <option value="high">High</option>
  </select><br><br>
  <input type="submit" value="Log Exercise">
</form>
</body>
</html>
