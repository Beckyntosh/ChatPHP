<?php
// Establish MySQL connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL to create table
$createEventsTable = "CREATE TABLE IF NOT EXISTS virtual_events (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
event_name VARCHAR(100) NOT NULL,
event_description TEXT,
event_date DATETIME NOT NULL,
capacity INT(10),
reg_count INT(10) DEFAULT 0,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($createEventsTable) === TRUE) {
  echo "Table virtual_events created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert Event
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $event_name = $_POST['event_name'];
  $event_description = $_POST['event_description'];
  $event_date = $_POST['event_date'];
  $capacity = $_POST['capacity'];

  $insertSQL = "INSERT INTO virtual_events (event_name, event_description, event_date, capacity) VALUES (?, ?, ?, ?)";

  $stmt = $conn->prepare($insertSQL);
  $stmt->bind_param("sssi", $event_name, $event_description, $event_date, $capacity);

  if ($stmt->execute()) {
    echo "New event created successfully";
  } else {
    echo "Error: " . $insertSQL . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Virtual Events Calendar</title>
</head>
<body>

<h2>Virtual Book Club Meeting Setup</h2>

<form method="post">
  <label for="event_name">Event Name:</label><br>
  <input type="text" id="event_name" name="event_name" required><br>
  <label for="event_description">Event Description:</label><br>
  <textarea id="event_description" name="event_description" required></textarea><br>
  <label for="event_date">Event Date:</label><br>
  <input type="datetime-local" id="event_date" name="event_date" required><br>
  <label for="capacity">Capacity:</label><br>
  <input type="number" id="capacity" name="capacity" required><br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
