<?php
// Connecting to the database
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
$table_sql = "CREATE TABLE IF NOT EXISTS habits (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  habit_name VARCHAR(30) NOT NULL,
  goal VARCHAR(255) NOT NULL,
  reminder_time TIME,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!$conn->query($table_sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $habit_name = $_POST['habit_name'];
  $goal = $_POST['goal'];
  $reminder_time = $_POST['reminder_time'];

  $insert_sql = "INSERT INTO habits (habit_name, goal, reminder_time) VALUES (?, ?, ?)";

  // Prepare and bind
  $stmt = $conn->prepare($insert_sql);
  $stmt->bind_param("sss", $habit_name, $goal, $reminder_time);

  if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $insert_sql . "<br>" . $conn->error;
  }

  $stmt->close();
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
        input, button { width: 100%; padding: 10px; margin: 5px 0; }
        button { cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add a New Habit</h2>
        <form method="POST">
            <input type="text" name="habit_name" placeholder="Habit Name" required>
            <input type="text" name="goal" placeholder="Goal" required>
            <input type="time" name="reminder_time" placeholder="Reminder Time" required>
            <button type="submit">Add Habit</button>
        </form>
    </div>
</body>
</html>