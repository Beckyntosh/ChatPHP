<?php

// Database connection settings
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create table if not exists
$createEventsTable = "CREATE TABLE IF NOT EXISTS virtual_events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(50) NOT NULL,
    event_date DATE NOT NULL,
    capacity INT(10) NOT NULL,
    reg_date TIMESTAMP
)";

if (!$conn->query($createEventsTable)) {
    echo "Error creating table: " . $conn->error;
}

// Handle POST request to add a Virtual Book Club Meeting
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addEvent'])) {
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $capacity = $_POST['capacity'];

    $insertSQL = "INSERT INTO virtual_events (event_name, event_date, capacity) VALUES ('$event_name', '$event_date', '$capacity')";

    if ($conn->query($insertSQL) === TRUE) {
        echo "New event created successfully";
    } else {
        echo "Error: " . $insertSQL . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Virtual Event Calendar</title>
</head>
<body>

<h2>Virtual Book Club Meeting Setup</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="event_name">Event Name:</label><br>
  <input type="text" id="event_name" name="event_name" required><br>

  <label for="event_date">Event Date:</label><br>
  <input type="date" id="event_date" name="event_date" required><br>

  <label for="capacity">Capacity:</label><br>
  <input type="number" id="capacity" name="capacity" required><br><br>

  <input type="submit" value="Add Event" name="addEvent">
</form> 

<h2>Upcoming Virtual Events</h2>

<?php
$query = "SELECT * FROM virtual_events ORDER BY event_date ASC";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>" . htmlspecialchars($row["event_name"]). " - " . htmlspecialchars($row["event_date"]). " - Capacity: " . htmlspecialchars($row["capacity"]) . "</li>";
    }
    echo "</ul>";
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>
