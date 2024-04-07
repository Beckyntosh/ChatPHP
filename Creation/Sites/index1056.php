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

// Create table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS event_feedback (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
event_name VARCHAR(100) NOT NULL,
attendee_email VARCHAR(50),
feedback TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($createTable) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_name = $_POST['event_name'];
    $attendee_email = $_POST['attendee_email'];
    $feedback = $_POST['feedback'];

    $stmt = $conn->prepare("INSERT INTO event_feedback (event_name, attendee_email, feedback) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $event_name, $attendee_email, $feedback);
    $stmt->execute();

    echo "<p>Feedback submitted successfully!</p>";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Event Feedback Portal</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { margin: 20px; padding: 20px; border: 1px solid #ccc; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], textarea { width: 100%; margin-bottom: 10px; padding: 8px; }
        input[type="submit"] { padding: 10px 15px; background-color: #007bff; color: #ffffff; border: none; cursor: pointer; }
        input[type="submit"]:hover { background-color: #0056b3; }
    </style>
</head>
<body>

<h2>Leave Your Feedback</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="event_name">Event Name:</label>
    <input type="text" id="event_name" name="event_name" required>

    <label for="attendee_email">Your Email:</label>
    <input type="text" id="attendee_email" name="attendee_email" required>

    <label for="feedback">Feedback:</label>
    <textarea id="feedback" name="feedback" required></textarea>

    <input type="submit" value="Submit Feedback">
</form>

</body>
</html>

<?php
$conn->close();
?>
