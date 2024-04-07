<?php

// Connection Variables
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

// Create table query
$sql = "CREATE TABLE IF NOT EXISTS HabitTracker (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit VARCHAR(50) NOT NULL,
goal INT NOT NULL,
dateLogged DATE NOT NULL,
progress INT DEFAULT 0,
reg_date TIMESTAMP
)";

// Execute query
if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handling the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['habit']) && isset($_POST['goal'])) {
  $habit = $_POST['habit'];
  $goal = $_POST['goal'];
  $dateLogged = date('Y-m-d');

  // Insert the habit entry
  $stmt = $conn->prepare("INSERT INTO HabitTracker (habit, goal, dateLogged) VALUES (?, ?, ?)");
  $stmt->bind_param("sis", $habit, $goal, $dateLogged);
  $stmt->execute();
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
</head>
<body>
    <h1>Habit Tracker</h1>
    <form action="" method="post">
        <label for="habit">Habit Name:</label><br>
        <input type="text" id="habit" name="habit" required><br>
        <label for="goal">Daily Goal (e.g., 2000ml for water):</label><br>
        <input type="number" id="goal" name="goal" required><br><br>
        <input type="submit" value="Add Habit">
    </form>
</body>
</html>
