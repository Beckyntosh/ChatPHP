<?php

// DB connection credentials
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

// Create EventFeedback table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS EventFeedback (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
event_name VARCHAR(255) NOT NULL,
attendee_name VARCHAR(255) NOT NULL,
rating INT(10),
feedback TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table creation success
} else {
  echo "Error creating table: " . $conn->error;
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $event_name = $_POST['event_name'];
  $attendee_name = $_POST['attendee_name'];
  $rating = $_POST['rating'];
  $feedback = $_POST['feedback'];

  $stmt = $conn->prepare("INSERT INTO EventFeedback (event_name, attendee_name, rating, feedback) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssis", $event_name, $attendee_name, $rating, $feedback);

  if ($stmt->execute() === TRUE) {
    echo "Feedback submitted successfully";
  } else {
    echo "Error submitting feedback: " . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Event Feedback Portal</title>
</head>
<body>

<h2>Event Feedback Form</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="event_name">Event Name:</label><br>
  <input type="text" id="event_name" name="event_name" required><br>
  <label for="attendee_name">Your Name:</label><br>
  <input type="text" id="attendee_name" name="attendee_name" required><br>
  <label for="rating">Rating (1-10):</label><br>
  <input type="number" id="rating" name="rating" min="1" max="10" required><br>
  <label for="feedback">Feedback:</label><br>
  <textarea id="feedback" name="feedback" rows="4" cols="50" required></textarea><br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
