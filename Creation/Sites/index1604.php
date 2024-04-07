<?php
// Define MySQL connection
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create events table if it doesn't exist
try {
    $sql = "CREATE TABLE IF NOT EXISTS events (
        id INT AUTO_INCREMENT PRIMARY KEY,
        event_name VARCHAR(255) NOT NULL,
        event_date DATETIME NOT NULL,
        capacity INT NOT NULL,
        description TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $capacity = $_POST['capacity'];
    $description = $_POST['description'];

    // Insert new event into the database
    $sql = "INSERT INTO events (event_name, event_date, capacity, description) VALUES (?, ?, ?, ?)";
    if ($stmt = $pdo->prepare($sql)) {
        if ($stmt->execute([$event_name, $event_date, $capacity, $description])) {
            echo "<script>alert('Event successfully added!');</script>";
        } else {
            echo "<script>alert('Error. Please try again later.');</script>";
        }
    }
    unset($stmt);
}
unset($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Event Calendar</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 600px; margin: 0 auto; padding: 20px; }
        form { display: flex; flex-direction: column; }
        input, textarea, button { margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add a Virtual Book Club Meeting</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="event_name" placeholder="Event Name" required>
            <input type="datetime-local" name="event_date" placeholder="Event Date" required>
            <input type="number" name="capacity" placeholder="Capacity" required>
            <textarea name="description" rows="5" placeholder="Description"></textarea>
            <button type="submit">Add Event</button>
        </form>
    </div>
</body>
</html>
