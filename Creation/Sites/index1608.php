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

// Create events table if it doesn't exist
$createEventsTable = "CREATE TABLE IF NOT EXISTS events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    eventName VARCHAR(30) NOT NULL,
    eventDate DATETIME NOT NULL,
    maxParticipants INT(6) NOT NULL,
    description TEXT,
    registrationOpen TINYINT(1) DEFAULT 1,
    UNIQUE KEY unique_event (eventName, eventDate)
    )";

if ($conn->query($createEventsTable) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle POST request to create a new event
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventName = $_POST["eventName"];
    $eventDate = $_POST["eventDate"];
    $maxParticipants = $_POST["maxParticipants"];
    $description = $_POST["description"];

    $insertEvent = "INSERT INTO events (eventName, eventDate, maxParticipants, description) VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($insertEvent);
    $stmt->bind_param("ssis", $eventName, $eventDate, $maxParticipants, $description);

    if ($stmt->execute()) {
        echo "New event created successfully";
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
    <title>Virtual Event Calendar</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; }
        input[type=text], input[type=datetime-local], input[type=number] { width: 100%; margin: 10px 0; padding: 10px; }
        textarea { width: 100%; height: 100px; margin: 10px 0; padding: 10px; }
        input[type=submit] { width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 10px 0; border: none; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="container">
    <h2>Create a Virtual Event</h2>
    <form action="" method="post">
        <label for="eventName">Event Name:</label>
        <input type="text" id="eventName" name="eventName" required>
        
        <label for="eventDate">Event Date and Time:</label>
        <input type="datetime-local" id="eventDate" name="eventDate" required>
        
        <label for="maxParticipants">Maximum Participants:</label>
        <input type="number" id="maxParticipants" name="maxParticipants" required>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
        
        <input type="submit" value="Create Event">
    </form>
</div>

</body>
</html>
