<?php

// Connection parameters
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Connect to MySQL Database
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for events if it does not exist
$createTable = "CREATE TABLE IF NOT EXISTS virtual_events (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    event_date DATETIME NOT NULL,
    capacity INT(11) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTable)) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $event_date = $_POST['event_date'];
    $capacity = $_POST['capacity'];
    $description = $_POST['description'];

    $insertSql = "INSERT INTO virtual_events (title, event_date, capacity, description) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("ssis", $title, $event_date, $capacity, $description);

    if ($stmt->execute()) {
        echo "<p>Event created successfully!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Virtual Event</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .events-list {
            list-style-type: none;
            padding: 0;
        }

        .event-item {
            background: #dff0d8;
            padding: 10px;
            margin: 5px 0;
            border-left: 5px solid #3c763d;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Create Virtual Book Club Meeting</h2>
    <form action="" method="post">
        <label for="title">Event Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="event_date">Event Date:</label>
        <input type="datetime-local" id="event_date" name="event_date" required>

        <label for="capacity">Capacity:</label>
        <input type="number" id="capacity" name="capacity" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <input type="submit" value="Create Event">
    </form>
</div>

</body>

</html>
