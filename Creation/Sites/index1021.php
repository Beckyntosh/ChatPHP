<?php
// Simple Event Feedback Portal for Craft Beer Site
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Create table if not exists
$table_sql = "CREATE TABLE IF NOT EXISTS event_feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    attendee_email VARCHAR(255) NOT NULL,
    rating INT NOT NULL,
    feedback TEXT,
    submit_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($table_sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// PHP code to handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_name = $_POST["event_name"];
    $attendee_email = $_POST["attendee_email"];
    $rating = $_POST["rating"];
    $feedback = $_POST["feedback"];

    $stmt = $conn->prepare("INSERT INTO event_feedback (event_name, attendee_email, rating, feedback) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $event_name, $attendee_email, $rating, $feedback);

    if ($stmt->execute() === TRUE) {
        echo "<p>Feedback submitted successfully!</p>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <p>
    <label for="event_name">Event Name:</label>
    <input type="text" id="event_name" name="event_name" required>
  </p>
  <p>
    <label for="attendee_email">Your Email:</label>
    <input type="email" id="attendee_email" name="attendee_email" required>
  </p>
  <p>
    <label for="rating">Your Rating:</label>
    <select id="rating" name="rating" required>
      <option value="1">1 - Poor</option>
      <option value="2">2 - Fair</option>
      <option value="3">3 - Good</option>
      <option value="4">4 - Very Good</option>
      <option value="5">5 - Excellent</option>
    </select>
  </p>
  <p>
    <label for="feedback">Your Feedback:</label>
    <textarea id="feedback" name="feedback"></textarea>
  </p>
  <button type="submit">Submit Feedback</button>
</form>
</body>
</html>
