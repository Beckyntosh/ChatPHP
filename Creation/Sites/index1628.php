<?php
// Database connection
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

// Create events table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS virtual_events (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  event_name VARCHAR(50) NOT NULL,
  event_date DATE NOT NULL,
  start_time TIME NOT NULL,
  end_time TIME NOT NULL,
  capacity INT(6) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $event_name = $_POST['event_name'];
  $event_date = $_POST['event_date'];
  $start_time = $_POST['start_time'];
  $end_time = $_POST['end_time'];
  $capacity = $_POST['capacity'];

  $sql = "INSERT INTO virtual_events (event_name, event_date, start_time, end_time, capacity)
  VALUES ('".$event_name."', '".$event_date."', '".$start_time."', '".$end_time."', ".$capacity.")";

  if ($conn->query($sql) === TRUE) {
    echo "New event created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Virtual Event Calendar</title>
</head>
<body>

<h2>Create a Virtual Book Club Meeting</h2>

<form method="post" action="">
  <label for="event_name">Event Name:</label><br>
  <input type="text" id="event_name" name="event_name" required><br>
  <label for="event_date">Event Date:</label><br>
  <input type="date" id="event_date" name="event_date" required><br>
  <label for="start_time">Start Time:</label><br>
  <input type="time" id="start_time" name="start_time" required><br>
  <label for="end_time">End Time:</label><br>
  <input type="time" id="end_time" name="end_time" required><br>
  <label for="capacity">Capacity:</label><br>
  <input type="number" id="capacity" name="capacity" min="1" required><br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>

<?php
// Closing connection
$conn->close();
?>
