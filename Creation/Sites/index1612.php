<?php
// Define MySQL connection parameters
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

// Create event table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS virtual_events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    event_date DATETIME NOT NULL,
    capacity INT DEFAULT 0,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($createTable) === TRUE) {
  echo "Table 'virtual_events' created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $eventName = $_POST['eventName'];
  $eventDate = $_POST['eventDate'];
  $capacity = $_POST['capacity'];
  $description = $_POST['description'];

  // Insert the new event
  $insertSql = "INSERT INTO virtual_events (event_name, event_date, capacity, description)
  VALUES (?, ?, ?, ?)";

  $stmt = $conn->prepare($insertSql);
  $stmt->bind_param("ssis", $eventName, $eventDate, $capacity, $description);

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
<html>
<head>
  <title>Virtual Event Calendar</title>
</head>
<body>
<h2>Create a Virtual Event</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="eventName">Event Name:</label><br>
  <input type="text" id="eventName" name="eventName" required><br>
  <label for="eventDate">Event Date:</label><br>
  <input type="datetime-local" id="eventDate" name="eventDate" required><br>
  <label for="capacity">Capacity:</label><br>
  <input type="number" id="capacity" name="capacity" required><br>
  <label for="description">Description:</label><br>
  <textarea id="description" name="description" required></textarea><br><br>
  <input type="submit" value="Submit">
</form>
</body>
</html>
