<?php
// Simple example for educational purposes and may not follow security best practices (e.g., use of parameterized queries to prevent SQL injection, etc.)

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

// Create exercise log table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS exercise_log (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
exercise_name VARCHAR(30) NOT NULL,
duration INT(10),
intensity VARCHAR(10),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table exercise_log created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $exercise_name = $_POST['exercise_name'];
  $duration = $_POST['duration'];
  $intensity = $_POST['intensity'];

  $sql = "INSERT INTO exercise_log (exercise_name, duration, intensity)
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Exercise to Digital Workout Log</title>
</head>
<body>
    <h2>Add Your Exercise</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <label for="exercise_name">Exercise Name:</label><br>
        <input type="text" id="exercise_name" name="exercise_name" required><br>
        <label for="duration">Duration (in minutes):</label><br>
        <input type="number" id="duration" name="duration" required><br>
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
