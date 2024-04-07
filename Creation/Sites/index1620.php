<?php
// File: event-calendar.php

// Database Connection
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

// Create event_table if not exists
$sql = "CREATE TABLE IF NOT EXISTS events (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
event_name VARCHAR(30) NOT NULL,
event_date DATE NOT NULL,
capacity INT(6) NOT NULL,
reg_count INT(6) NOT NULL DEFAULT 0,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}


// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $event_name = $_POST['event_name'];
  $event_date = $_POST['event_date'];
  $capacity = $_POST['capacity'];

  $sql = "INSERT INTO events (event_name, event_date, capacity) VALUES (?, ?, ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssi", $event_name, $event_date, $capacity);
  if($stmt->execute()) {
    echo "<p>Event added successfully.</p>";
  } else {
    echo "<p>Error adding event: " . $conn->error . "</p>";
  }
  $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Virtual Event Calendar</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; }
        .form-group input[type="text"],
        .form-group input[type="date"],
        .form-group input[type="number"] { width: 100%; }
    </style>
</head>
<body>

<div class="container">
    <h1>Virtual Book Club Meeting Setup</h1>
    <form method="POST">
        <div class="form-group">
            <label for="event_name">Event Name:</label>
            <input type="text" id="event_name" name="event_name">
        </div>
        <div class="form-group">
            <label for="event_date">Event Date:</label>
            <input type="date" id="event_date" name="event_date">
        </div>
        <div class="form-group">
            <label for="capacity">Capacity:</label>
            <input type="number" id="capacity" name="capacity">
        </div>
        <button type="submit">Create Event</button>
    </form>

    <h2>Upcoming Events</h2>
    <ul>
        <?php
        $sql = "SELECT id, event_name, event_date, capacity, reg_count FROM events ORDER BY event_date ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<li>".htmlspecialchars($row['event_name'])." (".htmlspecialchars($row['event_date']).") - Registered: " . htmlspecialchars($row['reg_count']) . "/" .htmlspecialchars($row['capacity']). "</li>";
            }
        } else {
            echo "<li>No events scheduled.</li>";
        }
        ?>
    </ul>
</div>

</body>
</html>

<?php $conn->close(); ?>
