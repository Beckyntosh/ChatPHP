<?php
// Database connection setup
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create exercise table if it doesn't exist
$tableQuery = "CREATE TABLE IF NOT EXISTS exercises (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  exercise_name VARCHAR(30) NOT NULL,
  duration INT(10),
  intensity VARCHAR(30),
  reg_date TIMESTAMP
)";

if (!$conn->query($tableQuery) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $exercise_name = $_POST["exercise_name"];
  $duration = $_POST["duration"];
  $intensity = $_POST["intensity"];

  $insertQuery = "INSERT INTO exercises (exercise_name, duration, intensity)
  VALUES ('$exercise_name', '$duration', '$intensity')";

  if ($conn->query($insertQuery) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $insertQuery . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Exercise to Workout Log</title>
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #282c34;
  color: white;
  text-align: center;
}
form {
  display: inline-block;
  margin-top: 20px;
}
input[type="text"], input[type="number"] {
  padding: 10px;
  margin: 10px;
  border: none;
  border-radius: 5px;
}
input[type="submit"] {
  padding: 10px 20px;
  background-color: #61dafb;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
</style>
</head>
<body>

<h2>Add Exercise to Digital Workout Log</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Exercise Name: <input type="text" name="exercise_name" required><br>
  Duration (minutes): <input type="number" name="duration" required><br>
  Intensity: <select name="intensity">
    <option value="low">Low</option>
    <option value="moderate">Moderate</option>
    <option value="high">High</option>
  </select><br>
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>
