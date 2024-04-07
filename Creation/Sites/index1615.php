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

// Create Event Table if not exists
$eventTableSql = "CREATE TABLE IF NOT EXISTS virtual_events (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  event_name VARCHAR(50) NOT NULL,
  event_date DATETIME NOT NULL,
  capacity INT(10) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  )";

if ($conn->query($eventTableSql) === TRUE) {
  // Table creation success
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $eventName = $_POST["eventName"];
  $eventDate = $_POST["eventDate"];
  $capacity = $_POST["capacity"];

  // Insert event into the database
  $sql = "INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('$eventName', '$eventDate', '$capacity')";
  
  if ($conn->query($sql) === TRUE) {
    echo "<p>Event created successfully.</p>";
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
<title>Virtual Event Calendar</title>
<style>
  body { font-family: Arial, sans-serif; }
  .container { max-width: 600px; margin: auto; padding: 20px; }
  form { margin-top: 20px; }
  input, button { width: 100%; padding: 10px; margin: 10px 0; }
</style>
</head>
<body>
<div class="container">
  <h1>Create a Virtual Event</h1>
  <form action="" method="post">
    <input type="text" name="eventName" placeholder="Event Name" required>
    <input type="datetime-local" name="eventDate" placeholder="Event Date" required>
    <input type="number" name="capacity" placeholder="Capacity" required>
    <button type="submit">Create Event</button>
  </form>
</div>
</body>
</html>
