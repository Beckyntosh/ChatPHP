<?php
// Simple single-file feedback portal for a jewelry event

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

// Create feedback table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS event_feedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    eventName VARCHAR(50) NOT NULL,
    attendeeName VARCHAR(50),
    rating INT(1),
    feedback TEXT,
    submitTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitFeedback'])) {
  $eventName = $_POST['eventName'];
  $attendeeName = $_POST['attendeeName'];
  $rating = $_POST['rating'];
  $feedback = $_POST['feedback'];
  
  $stmt = $conn->prepare("INSERT INTO event_feedback (eventName, attendeeName, rating, feedback) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssis", $eventName, $attendeeName, $rating, $feedback);
  
  if($stmt->execute()) {
    echo "<p>Feedback submitted successfully!</p>";
  } else {
    echo "<p>Error submitting feedback: " . $conn->error . "</p>";
  }
  
  $stmt->close();
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
        .container { max-width: 600px; margin: auto; }
        form { display: flex; flex-direction: column; }
        label { margin: 10px 0 5px; }
        input, textarea, button { padding: 10px; margin-bottom: 20px; }
        button { cursor: pointer; }
    </style>
</head>
<body>
<div class="container">
    <h2>Event Feedback Form</h2>
    <form method="post" action="">
        <label for="eventName">Event Name:</label>
        <input type="text" id="eventName" name="eventName" required>
        
        <label for="attendeeName">Your Name:</label>
        <input type="text" id="attendeeName" name="attendeeName">
        
        <label for="rating">Rating (1-5):</label>
        <input type="number" id="rating" name="rating" min="1" max="5" required>
        
        <label for="feedback">Feedback:</label>
        <textarea id="feedback" name="feedback" rows="4" required></textarea>
        
        <button type="submit" name="submitFeedback">Submit Feedback</button>
    </form>
</div>
</body>
</html>
