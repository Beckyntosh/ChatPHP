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

// Create database if it does not exist
$sql = "CREATE DATABASE IF NOT EXISTS my_database";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully or already exists";
} else {
  echo "Error creating database: " . $conn->error;
}

// sql to create table for Habits
$sql = "CREATE TABLE IF NOT EXISTS habits (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
habit_name VARCHAR(50) NOT NULL,
goal VARCHAR(50) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Habits created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert Data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $habit_name = $_POST['habit_name'];
  $goal = $_POST['goal'];

  $sql = "INSERT INTO habits (habit_name, goal)
  VALUES ('$habit_name', '$goal')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
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
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    color: #333;
    line-height: 1.6;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }
  .container {
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    border-radius: 8px;
  }
  form {
    display: flex;
    flex-direction: column;
  }
  input, button {
    margin-bottom: 20px;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
    font-size: 16px;
  }
  button {
    background-color: #007bff;
    color: white;
    border: none;
    cursor: pointer;
  }
  button:hover {
    background-color: #0056b3;
  }
</style>
</head>
<body>
<div class="container">
  <h2>Add New Habit</h2>
  <form action="" method="post">
    <label for="habit_name">Habit Name:</label>
    <input type="text" name="habit_name" id="habit_name" required>
    <label for="goal">Goal:</label>
    <input type="text" name="goal" id="goal" required>
    <button type="submit">Add Habit</button>
  </form>
</div>
</body>
</html>
