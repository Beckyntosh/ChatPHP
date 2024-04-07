

<?php
// Initialize database connection variables
$servername = "db";
$dbname = "my_database";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for event feedback if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS event_feedback (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
event_name VARCHAR(50) NOT NULL,
attendee_name VARCHAR(50),
rating INT(1),
feedback TEXT,
reg_date TIMESTAMP
) CHARACTER SET utf8 COLLATE utf8_general_ci";

if ($conn->query($sql) === TRUE) {
    echo "Table event_feedback created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_name = $_POST['event_name'];
    $attendee_name = $_POST['attendee_name'];
    $rating = $_POST['rating'];
    $feedback = $_POST['feedback'];

    // Insert feedback into the database
    $sql = "INSERT INTO event_feedback (event_name, attendee_name, rating, feedback)
    VALUES ('" . $event_name . "', '" . $attendee_name . "', '" . $rating . "', '" . $feedback . "')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
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
    <form method="post" action="">
        Event Name:<br>
        <input type="text" name="event_name" required><br>
        Your Name:<br>
        <input type="text" name="attendee_name"><br>
        Rating (1-5):<br>
        <input type="number" name="rating" min="1" max="5" required><br>
        Feedback:<br>
        <textarea name="feedback" required></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

### Important Notes:
- This script combines PHP and HTML in a single file, which isn't a best practice for maintainable or scalable applications. For a more robust application, use separate files for HTML (View), PHP (Controller), and SQL (Model), adhering to an MVC (Model-View-Controller) pattern or similar.
- For security reasons, using placeholders (prepared statements) in queries is crucial to prevent SQL injection.
- Depending on the actual complexity and the features required by your Bath Products website, you might need to adjust the database schema, add authentication, manage sessions, and include data validation and sanitation.
- Ensure you have PHP and MySQL installed on your server and the credentials used in the script match those of your database user.