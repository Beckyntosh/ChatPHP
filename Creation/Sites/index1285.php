<?php
// Connection variables
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

// Create tables if they don't exist
$createTable = "CREATE TABLE IF NOT EXISTS exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(50) NOT NULL,
    duration INT(10),
    intensity VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($createTable) === TRUE) {
    echo "Table exercises created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Check for POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exercise_name = $_POST['exercise_name'];
    $duration = $_POST['duration'];
    $intensity = $_POST['intensity'];

    $sql = "INSERT INTO exercises (exercise_name, duration, intensity)
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
<title>Add Exercise</title>
</head>
<body>
<h2>Add Your Exercise</h2>
<form method="post">
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
