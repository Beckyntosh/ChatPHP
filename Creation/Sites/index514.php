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

// Create exercise log table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS exercise_logs (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  exercise_type VARCHAR(30) NOT NULL,
  duration_minutes INT(10),
  intensity VARCHAR(10),
  log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table exercise_logs created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $exerciseType = $_POST['exerciseType'];
  $durationMinutes = $_POST['durationMinutes'];
  $intensity = $_POST['intensity'];

  $stmt = $conn->prepare("INSERT INTO exercise_logs (exercise_type, duration_minutes, intensity) VALUES (?, ?, ?)");
  $stmt->bind_param("sis", $exerciseType, $durationMinutes, $intensity);

  if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Log Exercise</title>
</head>
<body>

<h2>Exercise Log</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="exerciseType">Exercise Type:</label><br>
  <input type="text" id="exerciseType" name="exerciseType" required><br>
  <label for="durationMinutes">Duration (minutes):</label><br>
  <input type="number" id="durationMinutes" name="durationMinutes" required><br>
  <label for="intensity">Intensity:</label><br>
  <select id="intensity" name="intensity" required>
    <option value="low">Low</option>
    <option value="moderate">Moderate</option>
    <option value="high">High</option>
  </select><br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>
