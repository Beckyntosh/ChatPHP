<?php
// Define MySQL connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create Exercise Log Table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS exercise_log (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
exercise_name VARCHAR(30) NOT NULL,
duration_minutes INT(10),
intensity VARCHAR(30),
log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle the post request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $exercise_name = $_POST['exercise_name'];
  $duration_minutes = $_POST['duration_minutes'];
  $intensity = $_POST['intensity'];

  // Insert the exercise into the database
  $stmt = $conn->prepare("INSERT INTO exercise_log (exercise_name, duration_minutes, intensity) VALUES (?, ?, ?)");
  $stmt->bind_param("sis", $exercise_name, $duration_minutes, $intensity);
  
  if($stmt->execute()){
    echo "New record created successfully";
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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Exercise Log</title>
<style>
  body {font-family: Arial, sans-serif; background-color: #f0f0f0; color: #333;}
  .container {max-width: 600px; margin: auto; padding: 20px; background: white; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);}
  h2 {text-align: center; color: darkcyan;}
  form {display: flex; flex-direction: column;}
  label {margin: 10px 0 5px;}
  input, select {padding: 10px; margin-bottom: 20px; border: 1px solid #ddd; border-radius: 5px;}
  button {background-color: darkcyan; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;}
  button:hover {background-color: teal;}
</style>
</head>
<body>

<div class="container">
  <h2>Add Exercise to Digital Workout Log</h2>
  <form action="" method="post">

    <label for="exercise_name">Exercise Name:</label>
    <input type="text" id="exercise_name" name="exercise_name" required>

    <label for="duration_minutes">Duration (minutes):</label>
    <input type="number" id="duration_minutes" name="duration_minutes" required>

    <label for="intensity">Intensity:</label>
    <select id="intensity" name="intensity" required>
      <option value="low">Low</option>
      <option value="moderate">Moderate</option>
      <option value="high">High</option>
    </select>

    <button type="submit">Log Exercise</button>
  </form>
</div>

</body>
</html>
