<?php
// Define MySQL connection parameters
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

// Try to create the habits table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS habits (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit_name VARCHAR(255) NOT NULL,
target_goal INT(6) NOT NULL,
daily_progress INT(6) NOT NULL DEFAULT 0,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // echo "Table habits created successfully";
} else {
  die("Error creating table: " . $conn->error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $habit_name = $_POST['habit_name'];
  $target_goal = $_POST['target_goal'];
  $daily_progress = $_POST['daily_progress'];
  
  $sql = "INSERT INTO habits (habit_name, target_goal, daily_progress)
  VALUES ('$habit_name', '$target_goal', '$daily_progress')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('New record created successfully');</script>";
  } else {
    echo "<script>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Habit Tracker</title>
<style>
body {
  font-family: Arial, sans-serif;
}
.container {
  max-width: 600px;
  margin: auto;
  padding: 20px;
}
</style>
</head>
<body>

<div class="container">
  <h2>Add a New Habit Entry</h2>
  <form action="" method="post">
    <label for="habit_name">Habit Name:</label><br>
    <input type="text" id="habit_name" name="habit_name" required><br>
    <label for="target_goal">Target Goal (quantity):</label><br>
    <input type="number" id="target_goal" name="target_goal" required><br>
    <label for="daily_progress">Today's Progress:</label><br>
    <input type="number" id="daily_progress" name="daily_progress" required><br><br>
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>
