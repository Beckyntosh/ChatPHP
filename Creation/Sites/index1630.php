<?php
// Simple Virtual Event Calendar for a Virtual Book Club Meeting
// Adding this code directly to your website will require customization and additional security measures.

// Database connection details
define("DB_SERVER", "db");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "my_database");

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create events table if it doesn't exist
try {
    $sql = "CREATE TABLE IF NOT EXISTS events (
                id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                event_date DATE NOT NULL,
                start_time TIME NOT NULL,
                end_time TIME NOT NULL,
                capacity INT NOT NULL,
                details TEXT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )  ENGINE=INNODB;";
    $pdo->exec($sql);
} catch (PDOException $e) {
    die("ERROR: Could not create table. " . $e->getMessage());
}

// Insert or update event
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $title = $_POST['title'];
    $event_date = $_POST['event_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $capacity = $_POST['capacity'];
    $details = $_POST['details'];

    try {
        $sql = "INSERT INTO events (title, event_date, start_time, end_time, capacity, details) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$title, $event_date, $start_time, $end_time, $capacity, $details]);
    } catch (PDOException $e) {
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Virtual Book Club Meeting</title>
</head>
<body>
    <h2>Create a Virtual Event</h2>
    <form action="" method="post">
        <label>Title:</label><br>
        <input type="text" name="title" required><br>
        
        <label>Event Date:</label><br>
        <input type="date" name="event_date" required><br>
        
        <label>Start Time:</label><br>
        <input type="time" name="start_time" required><br>
        
        <label>End Time:</label><br>
        <input type="time" name="end_time" required><br>
        
        <label>Capacity:</label><br>
        <input type="number" name="capacity" required><br>
        
        <label>Details:</label><br>
        <textarea name="details" required></textarea><br>
        
        <input type="submit" name="submit" value="Submit">
    </form>

    <h2>Upcoming Events</h2>
    <?php
    try {
        $sql = "SELECT * FROM events WHERE event_date >= CURDATE() ORDER BY event_date ASC, start_time ASC";
        $stmt = $pdo->query($sql);
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                echo "<p><strong>" . htmlspecialchars($row['title']) . "</strong><br>"
                    . htmlspecialchars($row['event_date']) . " " . htmlspecialchars($row['start_time']) . " - " . htmlspecialchars($row['end_time'])
                    . "<br>Capacity: " . htmlspecialchars($row['capacity'])
                    . "<br>Details: " . htmlspecialchars($row['details']) . "</p>";
            }
        } else {
            echo "<p>No upcoming events.</p>";
        }
    } catch (PDOException $e) {
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }

    // Close connection
    unset($pdo);
    ?>
</body>
</html>
