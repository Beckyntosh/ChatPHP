<?php
// Database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Attempt to connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for events if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(50) NOT NULL,
    event_date DATE NOT NULL,
    event_time TIME NOT NULL,
    capacity INT(10),
    description TEXT,
    reg_count INT(10) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Insert a new event
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_name = $_POST["event_name"];
    $event_date = $_POST["event_date"];
    $event_time = $_POST["event_time"];
    $capacity = $_POST["capacity"];
    $description = $_POST["description"];

    $sql = "INSERT INTO events (event_name, event_date, event_time, capacity, description)
    VALUES ('$event_name', '$event_date', '$event_time', '$capacity', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Skateboard Virtual Event Calendar</title>
</head>
<body>
    <h1>Create a Virtual Event</h1>
    <form method="post" action="event_calendar.php">
        <label for="event_name">Event Name:</label><br>
        <input type="text" id="event_name" name="event_name" required><br>
        <label for="event_date">Event Date:</label><br>
        <input type="date" id="event_date" name="event_date" required><br>
        <label for="event_time">Event Time:</label><br>
        <input type="time" id="event_time" name="event_time" required><br>
        <label for="capacity">Capacity:</label><br>
        <input type="number" id="capacity" name="capacity" required><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br>
        <input type="submit" value="Create Event">
    </form>

    <h2>Upcoming Events</h2>
    <?php
    $sql = "SELECT * FROM events ORDER BY event_date, event_time ASC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div><strong>" . $row["event_name"]. "</strong> - Date: " . $row["event_date"]. " Time: " . $row["event_time"]. " - Slots Available: " . ($row["capacity"] - $row["reg_count"]) . "</div>";
            echo "<p>" . $row["description"]. "</p><hr>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</body>
</html>
