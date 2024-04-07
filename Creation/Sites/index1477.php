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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS finance_goals (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
goal_amount DOUBLE NOT NULL,
saved_amount DOUBLE DEFAULT 0,
status VARCHAR(50) DEFAULT 'active',
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table finance_goals created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST['title'];
  $goal_amount = $_POST['goal_amount'];

  $sql = "INSERT INTO finance_goals (title, goal_amount) VALUES (?, ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sd", $title, $goal_amount);

  if ($stmt->execute()) {
    echo "<p>Finance goal added successfully!</p>";
  } else {
    echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
  }

  $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal Finance Goals</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { margin-bottom: 20px; }
        input, button { padding: 10px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 8px; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body>

<h2>Add a New Personal Finance Goal</h2>
<form action="" method="post">
    <label for="title">Goal Title:</label><br>
    <input type="text" id="title" name="title" required><br>
    <label for="goal_amount">Goal Amount ($):</label><br>
    <input type="number" id="goal_amount" name="goal_amount" min="1" required><br><br>
    <button type="submit">Add Goal</button>
</form>

</body>
</html>
