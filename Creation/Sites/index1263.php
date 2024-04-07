<?php
// Connect to the database
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

// Create table if it does not exist
$table = "CREATE TABLE IF NOT EXISTS workout_log (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
exercise_name VARCHAR(30) NOT NULL,
duration INT(10),
intensity VARCHAR(10),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
  // If table created or already exists, don't do anything
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $exercise_name = $_POST['exercise_name'];
  $duration = $_POST['duration'];
  $intensity = $_POST['intensity'];

  // Prepared statement to insert data into the workout log table
  $stmt = $conn->prepare("INSERT INTO workout_log (exercise_name, duration, intensity) VALUES (?, ?, ?)");
  $stmt->bind_param("sis", $exercise_name, $duration, $intensity);

  // Execute and check if successful
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
    <title>Add Exercise to Digital Workout Log</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            max-width: 500px;
            margin: auto;
        }
        input[type="text"], input[type="number"], select {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
  <h2>Add Exercise to Digital Workout Log</h2>
  <form action="" method="post">
    <label for="exercise_name">Exercise Name:</label>
    <input type="text" id="exercise_name" name="exercise_name" required>

    <label for="duration">Duration (in minutes):</label>
    <input type="number" id="duration" name="duration" required>

    <label for="intensity">Intensity:</label>
    <select id="intensity" name="intensity" required>
      <option value="low">Low</option>
      <option value="moderate">Moderate</option>
      <option value="high">High</option>
    </select>

    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>
