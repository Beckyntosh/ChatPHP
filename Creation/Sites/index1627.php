<?php
// Set up connection variables
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

// Create events table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS events (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
description TEXT NOT NULL,
event_date DATE NOT NULL,
capacity INT(6) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table creation success
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert an event if form submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $event_date = $_POST['event_date'];
    $capacity = $_POST['capacity'];

    $stmt = $conn->prepare("INSERT INTO events (title, description, event_date, capacity) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $title, $description, $event_date, $capacity);

    if($stmt->execute()) {
        echo "<p>Event created successfully.</p>";
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
    <title>Virtual Event Calendar</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: 0 auto; }
        form { display: flex; flex-wrap: wrap; }
        input, textarea { margin: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create a Virtual Event</h2>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <input type="text" name="title" placeholder="Event Title" required>
            <textarea name="description" rows="4" placeholder="Event Description" required></textarea>
            <input type="date" name="event_date" placeholder="Event Date" required>
            <input type="number" name="capacity" placeholder="Capacity" required>
            <input type="submit" value="Create Event">
        </form>
    </div>
</body>
</html>
