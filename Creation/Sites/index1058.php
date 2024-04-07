<?php
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

// Create Feedback Table if not exist
$sql = "CREATE TABLE IF NOT EXISTS event_feedback (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
event_name VARCHAR(255) NOT NULL,
attendee_name VARCHAR(255),
feedback TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $event_name = $conn->real_escape_string($_POST['event_name']);
  $attendee_name = $conn->real_escape_string($_POST['attendee_name']);
  $feedback = $conn->real_escape_string($_POST['feedback']);

  // Insert Feedback
  $sql = "INSERT INTO event_feedback (event_name, attendee_name, feedback) VALUES ('$event_name', '$attendee_name', '$feedback')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Feedback submitted successfully');</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Feedback Portal</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; }
        label { font-weight: bold; }
        input[type=text], textarea { width: 100%; padding: 10px; margin: 10px 0; }
        input[type=submit] { background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>
<div class="container">
    <h2>Event Feedback Form</h2>
    <form action="" method="post">
        <label for="event_name">Event Name:</label>
        <input type="text" id="event_name" name="event_name" required>

        <label for="attendee_name">Your Name:</label>
        <input type="text" id="attendee_name" name="attendee_name" required>

        <label for="feedback">Your Feedback:</label>
        <textarea id="feedback" name="feedback" rows="4" required></textarea>

        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>
