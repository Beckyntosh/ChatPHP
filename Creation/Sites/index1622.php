<?php
$mysqli = new mysqli("db", "root", "root", "my_database");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Create table if doesn't exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS virtual_events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    event_date DATE NOT NULL,
    capacity INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$mysqli->query($tableCreationQuery)) {
    echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventName = $_POST['eventName'];
    $eventDate = $_POST['eventDate'];
    $capacity = $_POST['capacity'];
                                                                 
    $stmt = $mysqli->prepare("INSERT INTO virtual_events (event_name, event_date, capacity) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $eventName, $eventDate, $capacity);
                                                                  
    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
  
    echo "<script>alert('Event added successfully!');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Virtual Event Calendar</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #50a3a2;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #077187 1px solid;
        }
        #main {
            padding: 20px;
        }
        input[type="text"], input[type="date"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #50a3a2;
            color: white;
            border: 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Virtual Event Calendar - Ada Lovelace Style</h1>
        </div>
    </header>
    <div id="main">
        <div class="container">
            <h2>Add a Virtual Event</h2>
            <form method="POST" action="">
                <label for="eventName">Event Name:</label>
                <input type="text" id="eventName" name="eventName" required>
                
                <label for="eventDate">Event Date:</label>
                <input type="date" id="eventDate" name="eventDate" required>
                
                <label for="capacity">Capacity:</label>
                <input type="number" id="capacity" name="capacity" required>
                
                <input type="submit" value="Add Event">
            </form>
        </div>
    </div>
</body>
</html>
