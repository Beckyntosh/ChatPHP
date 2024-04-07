<?php
// Database connection
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

// Create table for habits if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS daily_habits (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit_name VARCHAR(255) NOT NULL,
goal INT UNSIGNED,
date_tracked DATE,
achieved BOOLEAN
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Insert or update habit entry
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $habit_name = $_POST["habit_name"];
  $goal = $_POST["goal"];
  $date_tracked = date('Y-m-d');
  $achieved = $_POST["achieved"] ? 1 : 0;

  $checkSql = "SELECT * FROM daily_habits WHERE habit_name='$habit_name' AND date_tracked='$date_tracked'";
  $result = $conn->query($checkSql);

  if ($result->num_rows > 0) {
    // Update
    $updateSql = "UPDATE daily_habits SET goal=$goal, achieved=$achieved WHERE habit_name='$habit_name' AND date_tracked='$date_tracked'";
    if ($conn->query($updateSql) !== TRUE) {
      echo "Error: " . $updateSql . "<br>" . $conn->error;
    }
  } else {
    // Insert
    $insertSql = "INSERT INTO daily_habits (habit_name, goal, date_tracked, achieved) VALUES ('$habit_name', '$goal', '$date_tracked', '$achieved')";
    if ($conn->query($insertSql) !== TRUE) {
      echo "Error: " . $insertSql . "<br>" . $conn->error;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Habit Tracker</title>
<style>
body { font-family: Arial, sans-serif; }
.container { width: 80%; margin: auto; }
form { margin-top: 20px; }
.input-group { margin-bottom: 10px; }
input[type=text], input[type=number] { width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ccc; border-radius: 4px; }
input[type=submit] { background-color: #4CAF50; color: white; padding: 14px 20px; border: none; border-radius: 4px; cursor: pointer; }
input[type=submit]:hover { background-color: #45a049; }
</style>
</head>
<body>
<div class="container">
<h2>Track Daily Habits for Hair Care</h2>
<form method="post" action="">
<div class="input-group">
<label for="habit_name">Habit Name</label>
<input type="text" id="habit_name" name="habit_name" required>
</div>
<div class="input-group">
<label for="goal">Goal (e.g., 2 liters of water)</label>
<input type="number" id="goal" name="goal" required>
</div>
<div class="input-group">
<input type="checkbox" id="achieved" name="achieved" value="1">
<label for="achieved">Achieved</label>
</div>
<div class="input-group">
<input type="submit" value="Track Habit">
</div>
</form>
</div>

<?php
// Display tracked habits
$sqlSelect = "SELECT * FROM daily_habits ORDER BY date_tracked DESC";
$result = $conn->query($sqlSelect);

if ($result->num_rows > 0) {
echo "<h3>Tracked Habits</h3><table border='1'><tr><th>Habit Name</th><th>Goal</th><th>Date</th><th>Achieved</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["habit_name"]. "</td><td>" . $row["goal"]. "</td><td>" . $row["date_tracked"]. "</td><td>" . ($row["achieved"] ? "Yes" : "No"). "</td></tr>";
  }
   echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>
</body>
</html>
