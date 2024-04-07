<?php
// Establish connection to the database
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

// Create table if not exists for Habit Tracker
$sql = "CREATE TABLE IF NOT EXISTS habit_tracker (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit_name VARCHAR(255) NOT NULL,
target INT(6) NOT NULL,
unit VARCHAR(50) NOT NULL,
date DATE NOT NULL,
progress INT(6) DEFAULT 0,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect post variables
  $habit_name = $_POST['habit_name'];
  $target = $_POST['target'];
  $unit = $_POST['unit'];
  $date = $_POST['date'];
  
  $insertSql = "INSERT INTO habit_tracker (habit_name, target, unit, date) 
  VALUES ('$habit_name', '$target', '$unit', '$date')";

  if ($conn->query($insertSql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $insertSql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Habit Tracker</title>
</head>
<body>
  <h2>Track a New Habit</h2>

  <form action="" method="post">
    <label for="habit_name">Habit Name:</label><br>
    <input type="text" id="habit_name" name="habit_name" required><br>
    <label for="target">Daily Target:</label><br>
    <input type="number" id="target" name="target" required><br>
    <label for="unit">Unit (e.g., glasses, steps):</label><br>
    <input type="text" id="unit" name="unit" required><br>
    <label for="date">Date:</label><br>
    <input type="date" id="date" name="date" required><br><br>
    <input type="submit" value="Submit">
  </form>

</body>
</html>
