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

// Create table
$tableSql = "CREATE TABLE IF NOT EXISTS events (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
description TEXT,
event_date DATE,
capacity INT(6),
reg_count INT(6) DEFAULT 0,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($tableSql) === FALSE) {
  echo "Error creating table: " . $conn->error;
  $conn->close();
  exit();
}

// Insert example data
$exampleSql = "INSERT INTO events (title, description, event_date, capacity) VALUES ('Virtual Book Club Meeting', 'Discussing our latest read.', '2023-05-10', 20)";
$conn->query($exampleSql);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST["title"];
  $description = $_POST["description"];
  $event_date = $_POST["event_date"];
  $capacity = $_POST["capacity"];

  $insertSql = "INSERT INTO events (title, description, event_date, capacity) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($insertSql);
  $stmt->bind_param("sssi", $title, $description, $event_date, $capacity);

  if ($stmt->execute() === FALSE) {
    echo "Error: " . $stmt->error;
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
<title>Virtual Event Calendar</title>
<style>
  body { font-family: Arial, sans-serif; }
  .container { max-width: 600px; margin: 0 auto; padding: 20px; }
  .form-group { margin-bottom: 15px; }
  label { font-weight: bold; }
  input[type="text"], input[type="date"], input[type="number"], textarea { width: 100%; padding: 8px; margin-top: 5px; }
  input[type="submit"] { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
  input[type="submit"]:hover { background-color: #45a049; }
</style>
</head>
<body>
<div class="container">
  <h1>Create a Virtual Event</h1>
  <form method="POST">
    <div class="form-group">
      <label for="title">Event Title:</label>
      <input type="text" id="title" name="title" required>
    </div>
    <div class="form-group">
      <label for="description">Event Description:</label>
      <textarea id="description" name="description" required></textarea>
    </div>
    <div class="form-group">
      <label for="event_date">Event Date:</label>
      <input type="date" id="event_date" name="event_date" required>
    </div>
    <div class="form-group">
      <label for="capacity">Capacity:</label>
      <input type="number" id="capacity" name="capacity" required>
    </div>
    <input type="submit" value="Create Event">
  </form>
</div>
</body>
</html>
