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

// Create event table if it doesn't exist
$tableSql = "CREATE TABLE IF NOT EXISTS virtual_events (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
event_name VARCHAR(50) NOT NULL,
event_date DATETIME NOT NULL,
capacity INT NOT NULL,
registered INT DEFAULT 0,
reg_date TIMESTAMP
)";

if ($conn->query($tableSql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $eventName = $_POST["eventName"];
  $eventDate = $_POST["eventDate"];
  $capacity = $_POST["capacity"];

  $insertSql = "INSERT INTO virtual_events (event_name, event_date, capacity)
  VALUES ('$eventName', '$eventDate', '$capacity')";

  if ($conn->query($insertSql) === TRUE) {
    echo "New event created successfully";
  } else {
    echo "Error: " . $insertSql . "<br>" . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Virtual Event Calendar</title>
</head>
<body>
    <h2>Set up a Virtual Book Club Meeting</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="eventName">Event Name:</label><br>
        <input type="text" id="eventName" name="eventName" required><br>
        <label for="eventDate">Event Date:</label><br>
        <input type="datetime-local" id="eventDate" name="eventDate" required><br>
        <label for="capacity">Capacity:</label><br>
        <input type="number" id="capacity" name="capacity" required><br>
        <input type="submit" value="Submit">
    </form>

    <h2>Upcoming Events</h2>
    <?php
    $selectSql = "SELECT id, event_name, event_date, capacity, registered FROM virtual_events ORDER BY event_date ASC";
    $result = $conn->query($selectSql);

    if ($result->num_rows > 0) {
      echo "<ul>";
      while($row = $result->fetch_assoc()) {
        echo "<li>" . $row["event_name"]. " - " . $row["event_date"]. " (Capacity: " . $row["capacity"]. " - Registered: " . $row["registered"]. ")</li>";
      }
      echo "</ul>";
    } else {
      echo "0 upcoming events";
    }
    $conn->close();
    ?>
</body>
</html>
