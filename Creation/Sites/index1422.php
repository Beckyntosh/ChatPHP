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

// Create table for tracking habits if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS daily_habits (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit_name VARCHAR(50) NOT NULL,
goal INT(10) NOT NULL,
progress INT(10) NOT NULL DEFAULT '0',
log_date DATE,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $habit_name = $_POST['habit_name'];
  $goal = $_POST['goal'];
  $progress = $_POST['progress'];
  $log_date = date('Y-m-d');

  $stmt = $conn->prepare("INSERT INTO daily_habits (habit_name, goal, progress, log_date) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("siis", $habit_name, $goal, $progress, $log_date);
  
  if ($stmt->execute()) {
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
  <title>Habit Tracker</title>
  <style>
    body { font-family: Arial, sans-serif; }
    .container { width: 80%; margin: auto; text-align: center; }
    input, button { margin: 5px; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Daily Habit Tracker</h2>
    <form method="POST">
      <input type="text" name="habit_name" placeholder="Habit Name" required>
      <input type="number" name="goal" placeholder="Goal (e.g., 2 liters)" required>
      <input type="number" name="progress" placeholder="Today's Progress (e.g., 1 liter)" required>
      <button type="submit">Add Entry</button>
    </form>
  </div>
</body>
</html>
