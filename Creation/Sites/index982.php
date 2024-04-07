<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database credentials
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

    // Sanitize and fetch input data
    $event_name = htmlspecialchars($_POST['event_name']);
    $attendee_email = htmlspecialchars($_POST['attendee_email']);
    $feedback = htmlspecialchars($_POST['feedback']);
    $rating = (int)$_POST['rating'];

    // SQL to insert feedback
    $sql = "INSERT INTO event_feedback (event_name, attendee_email, feedback, rating) VALUES (?, ?, ?, ?)";

    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $event_name, $attendee_email, $feedback, $rating);

    // Execute and close
    if ($stmt->execute()) {
        echo "<p>Feedback submitted successfully!</p>";
    } else {
        echo "<p>Failed to submit feedback: " . $conn->error . "</p>";
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Feedback Portal</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 60%; margin: auto; padding: 20px; }
        .feedback-form { display: flex; flex-direction: column; width: 50%; }
        label { margin: 10px 0 5px; }
        input, textarea, button { padding: 10px; margin-bottom: 20px; }
        button { cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Event Feedback Portal</h1>
        <p>Leave your feedback for an event.</p>
        <form action="" method="post" class="feedback-form">
            <label for="event_name">Event Name:</label>
            <input type="text" id="event_name" name="event_name" required>
            
            <label for="attendee_email">Your Email:</label>
            <input type="email" id="attendee_email" name="attendee_email" required>
            
            <label for="feedback">Feedback:</label>
            <textarea id="feedback" name="feedback" rows="5" required></textarea>
            
            <label for="rating">Rating:</label>
            <select id="rating" name="rating" required>
                <option value="5">5 - Excellent</option>
                <option value="4">4 - Very Good</option>
                <option value="3">3 - Good</option>
                <option value="2">2 - Fair</option>
                <option value="1">1 - Poor</option>
            </select>
            
            <button type="submit">Submit Feedback</button>
        </form>
    </div>

<?php
// Create table if not exists
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "CREATE TABLE IF NOT EXISTS event_feedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    attendee_email VARCHAR(255) NOT NULL,
    feedback TEXT NOT NULL,
    rating INT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}
$conn->close();
?>

</body>
</html>
