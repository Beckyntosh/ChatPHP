<?php
// Connection variables
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

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS habit_tracker (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit VARCHAR(50) NOT NULL,
goal INT(10),
progress INT(10),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $habit = $_POST['habit'];
  $goal = $_POST['goal'];

  $sql = "INSERT INTO habit_tracker (habit, goal, progress) VALUES (?, ?, 0)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("si", $habit, $goal);

  if ($stmt->execute()) {
    echo "<p>Habit added successfully!</p>";
  } else {
    echo "<p>Error adding habit: " . $stmt->error . "</p>";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Habit Tracker</title>
  <style>
    body { font-family: Arial, sans-serif; }
    .container { max-width: 600px; margin: auto; padding: 20px; }
    input[type=text], input[type=number] { width: 100%; padding: 10px; margin: 5px 0; box-sizing: border-box; }
    input[type=submit] { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; }
    input[type=submit]:hover { background-color: #45a049; }
  </style>
</head>
<body>
  <div class="container">
    <h2>Add a New Habit</h2>
    <form action="" method="post">
      <label for="habit">Habit</label>
      <input type="text" id="habit" name="habit" placeholder="Your habit.." required>
      
      <label for="goal">Goal (in liters for water)</label>
      <input type="number" id="goal" name="goal" placeholder="Your goal.." required>
      
      <input type="submit" value="Add Habit">
    </form>
  </div>
</body>
</html>
