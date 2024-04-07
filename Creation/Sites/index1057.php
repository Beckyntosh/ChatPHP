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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS event_feedback (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
event_name VARCHAR(50) NOT NULL,
attendee_name VARCHAR(50),
feedback VARCHAR(1000),
submit_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table event_feedback created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_feedback'])) {
  $eventName = htmlspecialchars($_POST['event_name']);
  $attendeeName = htmlspecialchars($_POST['attendee_name']);
  $feedback = htmlspecialchars($_POST['feedback']);

  $stmt = $conn->prepare("INSERT INTO event_feedback (event_name, attendee_name, feedback) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $eventName, $attendeeName, $feedback);

  if ($stmt->execute() === TRUE) {
    echo "<p>Feedback submitted successfully!</p>";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Feedback Portal</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f2f2f2; color: #333; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h2 { color: #4CAF50; }
        label { font-weight: bold; }
        input[type=text], textarea { width: 100%; padding: 12px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type=submit] { width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Event Feedback</h2>
        <form action="" method="post">
            <label for="event_name">Event Name:</label>
            <input type="text" id="event_name" name="event_name" required>

            <label for="attendee_name">Your Name:</label>
            <input type="text" id="attendee_name" name="attendee_name" required>

            <label for="feedback">Feedback:</label>
            <textarea id="feedback" name="feedback" rows="4" required></textarea>

            <input type="submit" name="submit_feedback" value="Submit Feedback">
        </form>
    </div>
</body>
</html>
