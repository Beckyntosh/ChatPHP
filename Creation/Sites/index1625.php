<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS virtual_events (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        event_name VARCHAR(255) NOT NULL,
        event_date DATETIME NOT NULL,
        capacity INT(11) NOT NULL,
        description TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    $conn->exec($sql);

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $capacity = $_POST['capacity'];
    $description = $_POST['description'];

    $sql = "INSERT INTO virtual_events (event_name, event_date, capacity, description) VALUES (?, ?, ?, ?)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$event_name, $event_date, $capacity, $description]);
        echo "<p style='color:green;'>Event successfully created!</p>";
    } catch (PDOException $e) {
        echo "<p style='color:red;'>Failed to create event: " . $e->getMessage() . "</p>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Virtual Book Club Event Creator</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f3f4f6; color: #333; }
        .container { max-width: 800px; margin: 15px auto; padding: 20px; background-color: #fff; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { color: #007bff; }
        form { margin-top: 20px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input, .form-group textarea { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        button { background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create a Virtual Book Club Meeting</h2>
        <form method="POST">
            <div class="form-group">
                <label for="event_name">Event Name:</label>
                <input type="text" name="event_name" id="event_name" required>
            </div>
            <div class="form-group">
                <label for="event_date">Event Date:</label>
                <input type="datetime-local" name="event_date" id="event_date" required>
            </div>
            <div class="form-group">
                <label for="capacity">Capacity:</label>
                <input type="number" name="capacity" id="capacity" min="1" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description"></textarea>
            </div>
            <button type="submit">Create Event</button>
        </form>
    </div>
</body>
</html>
