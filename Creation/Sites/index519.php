<?php
// MySQL connection
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

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS my_database";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

// sql to create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS workout_log (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  exercise_name VARCHAR(50) NOT NULL,
  duration INT(10),
  intensity VARCHAR(30),
  log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table workout_log created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

 Post exercise log
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $exercise_name = $_POST['exercise_name'];
  $duration = $_POST['duration'];
  $intensity = $_POST['intensity'];

  $sql = "INSERT INTO workout_log (exercise_name, duration, intensity)
  VALUES ('$exercise_name', '$duration', '$intensity')";

  if ($conn->query($sql) === TRUE) {
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
<title>Add Exercise to Workout Log</title>
<style>
body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f3f4f6; }
.container { max-width: 600px; margin: 20px auto; background-color: #fff; padding: 20px; box-shadow: 0 0 10px #ccc; }
input[type=text], select, input[type=number] { width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
input[type=submit] { width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer; }
input[type=submit]:hover { background-color: #45a049; }
h2 { color: #333; }
</style>
</head>
<body>

<div class="container">
<h2>Add Exercise to Digital Workout Log</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="exercise_name">Exercise Name:</label>
  <input type="text" id="exercise_name" name="exercise_name" required>
  
  <label for="duration">Duration (in minutes):</label>
  <input type="number" id="duration" name="duration" required>
  
  <label for="intensity">Intensity:</label>
  <select id="intensity" name="intensity">
    <option value="low">Low</option>
    <option value="moderate">Moderate</option>
    <option value="high">High</option>
  </select>
  
  <input type="submit" value="Log Exercise">
</form>
</div>

</body>
</html>
