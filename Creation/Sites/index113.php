<?php
// Initialize variables to connect to the database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$table_sql = "CREATE TABLE IF NOT EXISTS workout_log (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  exercise_type VARCHAR(30) NOT NULL,
  duration INT(10),
  intensity VARCHAR(30),
  entry_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
  // echo "Table workout_log created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $exercise_type = $_POST['exercise_type'];
  $duration = $_POST['duration'];
  $intensity = $_POST['intensity'];

  // Insert data into table
  $stmt = $conn->prepare("INSERT INTO workout_log (exercise_type, duration, intensity) VALUES (?, ?, ?)");
  $stmt->bind_param("sis", $exercise_type, $duration, $intensity);
  
  if ($stmt->execute() === TRUE) {
    // echo "New record created successfully";
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
    <title>Add Exercise Log</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f3f4f6; color: #333; }
        .container { max-width: 600px; margin: 20px auto; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        input[type="text"], input[type="number"] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; }
        input[type="submit"] { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
        label { font-size: 18px; }
    </style>
</head>
<body>
<div class="container">
    <h2>Add Exercise to Workout Log</h2>
    <form action="" method="post">
        <label for="exercise_type">Exercise Type:</label>
        <input type="text" id="exercise_type" name="exercise_type" required>
        
        <label for="duration">Duration (in minutes):</label>
        <input type="number" id="duration" name="duration" required>
        
        <label for="intensity">Intensity:</label>
        <input type="text" id="intensity" name="intensity" required>
        
        <input type="submit" value="Add Exercise">
    </form>
</div>
</body>
</html>