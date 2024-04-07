<?php
// Database configuration
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'my_database');

// Connect to database
try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create tables if they don't exist
    require_once("init.sql");
} catch (PDOException $e) {
    die("Error connecting to the database: " . $e->getMessage());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventName = $_POST['eventName'];
    $eventDate = $_POST['eventDate'];

    $query = "INSERT INTO events (name, date) VALUES (?, ?)";
    $stmt = $pdo->prepare($query);

    if ($stmt->execute([$eventName, $eventDate])) {
        echo "<script>alert('Event added successfully!');</script>";
    } else {
        echo "<script>alert('Failed to add the event.');</script>";
    }
}

// Retrieve events
$stmt = $pdo->query("SELECT * FROM events");
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitchenware Political Campaign Site</title>
    <style>
        body {
            background-color: #fde4cf;
            color: #364547;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #f9b067;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #0779e4 3px solid;
        }
        footer {
            background: #364547;
            color: #fff;
            text-align: center;
            padding: 20px;
            margin-top: 20px;
        }
        h1, h2 {
            text-align: center;
        }
        form {
            margin-top: 20px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Sun-Kissed Serenity: Kitchenware Political Event Planner</h1>
        </div>
    </header>

    <div class="container">
        <h2>Add Event to Calendar</h2>
        <form action="" method="post">
            <div>
                <label for="eventName">Event Name:</label>
                <input type="text" id="eventName" name="eventName" required>
            </div>
            <div>
                <label for="eventDate">Event Date:</label>
                <input type="date" id="eventDate" name="eventDate" required>
            </div>
            <div>
                <button type="submit">Add Event</button>
            </div>
        </form>

        <h2>Upcoming Events</h2>
        <ul>
            <?php foreach ($events as $event): ?>
                <li><?php echo htmlspecialchars($event['name']) . " - " . htmlspecialchars($event['date']); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <footer>
        <p>Kitchenware Political Campaign &copy; 2023</p>
    </footer>
</body>
</html>