<?php
// Define database connection parameters
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

// Create table if it does not exist
$eventTable = "CREATE TABLE IF NOT EXISTS virtual_events (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  eventName VARCHAR(30) NOT NULL,
  eventDate DATE NOT NULL,
  capacity INT UNSIGNED,
  description TEXT,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

if ($conn->query($eventTable) === TRUE) {
  echo "Table virtual_events created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Insertion form handler
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventName = $_POST['eventName'];
    $eventDate = $_POST['eventDate'];
    $capacity = $_POST['capacity'];
    $description = $_POST['description'];

    $sql = "INSERT INTO virtual_events (eventName, eventDate, capacity, description) VALUES ('$eventName', '$eventDate', '$capacity', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "New virtual event added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Virtual Event Calendar</title>
</head>
<body>
    <h1>Create a Virtual Book Club Meeting</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Event Name: <input type="text" name="eventName" required><br>
        Event Date: <input type="date" name="eventDate" required><br>
        Capacity: <input type="number" name="capacity" required><br>
        Description: <textarea name="description" required></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
