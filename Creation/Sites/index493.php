<?php

// Define MySQL credentials
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

// Create the event table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS virtual_event (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    event_date DATETIME NOT NULL,
    max_capacity INT NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql)) {
  echo "Error creating table: " . $conn->error;
}

// Insert a new event if POST data is available
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['event_name'])) {
  $event_name = $_POST['event_name'];
  $event_date = $_POST['event_date'];
  $max_capacity = $_POST['max_capacity'];
  $description = $_POST['description'];

  $stmt = $conn->prepare("INSERT INTO virtual_event (event_name, event_date, max_capacity, description) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssis", $event_name, $event_date, $max_capacity, $description);

  if ($stmt->execute()) {
    echo "<script>alert('Event created successfully');</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
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
        .container { max-width: 600px; margin: auto; padding: 20px; }
        form { display: flex; flex-direction: column; gap: 10px; }
        input, textarea, button { padding: 10px; font-size: 1rem; }
        button { cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create a Virtual Book Club Meeting</h2>
        <form method="post" action="">
            <input type="text" name="event_name" placeholder="Event Name" required>
            <input type="datetime-local" name="event_date" required>
            <input type="number" name="max_capacity" placeholder="Max Capacity" required>
            <textarea name="description" rows="4" placeholder="Description"></textarea>
            <button type="submit">Create Event</button>
        </form>
        <h2>Upcoming Events</h2>
        <?php
        $sql = "SELECT * FROM virtual_event ORDER BY event_date ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<div><h3>{$row['event_name']}</h3><p>Date: " . date("F j, Y, g:i a", strtotime($row['event_date'])) . "</p><p>Max Capacity: {$row['max_capacity']}</p><p>Description: {$row['description']}</p></div>";
          }
        } else {
          echo "No upcoming events";
        }
        ?>
    </div>
</body>
</html>
<?php
$conn->close();
?>
