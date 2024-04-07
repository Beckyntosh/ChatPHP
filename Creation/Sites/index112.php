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
$sql = "CREATE TABLE IF NOT EXISTS exercises (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
exercise_type VARCHAR(30) NOT NULL,
duration INT(10),
intensity VARCHAR(30),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Insert data
if(isset($_POST['submit'])) {
  $exercise_type = $_POST['exercise_type'];
  $duration = $_POST['duration'];
  $intensity = $_POST['intensity'];

  $sql = "INSERT INTO exercises (exercise_type, duration, intensity)
  VALUES ('$exercise_type', '$duration', '$intensity')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Exercise to Workout Log</title>
</head>
<body>

<h2>Add Exercise</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="exercise_type">Exercise Type:</label><br>
  <input type="text" id="exercise_type" name="exercise_type" required><br>
  <label for="duration">Duration (in minutes):</label><br>
  <input type="number" id="duration" name="duration" required><br>
  <label for="intensity">Intensity:</label><br>
  <input type="text" id="intensity" name="intensity" required><br>
  <input type="submit" name="submit" value="Submit">
</form> 


</body>
</html>