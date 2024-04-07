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

// Check if the table exists, if not, create it
$checkTable = "SELECT 1 FROM workout_log LIMIT 1";
if($conn->query($checkTable) === FALSE) {
    $sql = "CREATE TABLE workout_log (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(30) NOT NULL,
    duration INT(10),
    intensity VARCHAR(30),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table workout_log created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exercise_name = $_POST['exercise_name'];
    $duration = $_POST['duration'];
    $intensity = $_POST['intensity'];

    $sql = "INSERT INTO workout_log (exercise_name, duration, intensity) VALUES ('$exercise_name', '$duration', '$intensity')";

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
    <title>Workout Log</title>
</head>
<body>

<h2>Log a New Exercise</h2>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">  
  Exercise Name: <input type="text" name="exercise_name" required>
  <br><br>
  Duration (minutes): <input type="number" name="duration" required>
  <br><br>
  Intensity: 
  <select name="intensity" required>
    <option value="low">Low</option>
    <option value="moderate">Moderate</option>
    <option value="high">High</option>
  </select>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>

