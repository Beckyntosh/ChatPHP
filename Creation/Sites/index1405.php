<?php
// Handle habit tracking
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

// Create table if not exists
$createTable = "CREATE TABLE IF NOT EXISTS habit_tracker (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    habit_name VARCHAR(255) NOT NULL,
    target INT(6) NOT NULL,
    progress INT(6) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($createTable) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Insert or Update habit tracker
$habitName = isset($_POST['habit_name']) ? $_POST['habit_name'] : '';
$target = isset($_POST['target']) ? intval($_POST['target']) : 0;

if (!empty($habitName) && $target > 0) {
  $checkExists = "SELECT id FROM habit_tracker WHERE habit_name='" . $habitName . "'";
  $result = $conn->query($checkExists);

  if ($result->num_rows > 0) {
    $update = "UPDATE habit_tracker SET target=$target WHERE habit_name='" . $habitName . "'";
    if ($conn->query($update) !== TRUE) {
      echo "Error updating record: " . $conn->error;
    }
  } else {
    $insert = "INSERT INTO habit_tracker (habit_name, target) VALUES ('" . $habitName . "', $target)";
    if ($conn->query($insert) !== TRUE) {
      echo "Error inserting record: " . $conn->error;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Habit Tracker</title>
<style>
body { font-family: Arial, sans-serif; }
.container { max-width: 600px; margin: auto; padding: 20px; }
input, button { padding: 10px; margin: 5px 0; width: 100%; box-sizing: border-box; }
</style>
</head>
<body>
<div class="container">
  <h2>Track your Daily Habits</h2>
  <form method="POST">
    <input type="text" name="habit_name" placeholder="Habit name" required>
    <input type="number" name="target" placeholder="Target" required>
    <button type="submit">Submit</button>
  </form>
</div>
</body>
</html>
<?php
$conn->close();
?>
