<?php
// Database connection
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for exercises if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS exercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(255) NOT NULL, 
    duration_minutes INT NOT NULL, 
    intensity VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["type"]) && isset($_POST["duration"]) && isset($_POST["intensity"])) {
    $type = $_POST["type"];
    $duration = $_POST["duration"];
    $intensity = $_POST["intensity"];

    $stmt = $conn->prepare("INSERT INTO exercises (type, duration_minutes, intensity) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $type, $duration, $intensity);

    if (!$stmt->execute()) {
        echo "Error: " . $stmt->error;
    } else {
        echo "Exercise logged successfully!";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Exercise to Workout Log</title>
</head>
<body>
    <h1>Add Exercise to Your Digital Workout Log</h1>
    <form action="" method="post">
        <label for="type">Exercise Type:</label><br>
        <input type="text" id="type" name="type" required><br>
        <label for="duration">Duration (minutes):</label><br>
        <input type="number" id="duration" name="duration" required><br>
        <label for="intensity">Intensity:</label><br>
        <select id="intensity" name="intensity" required>
            <option value="low">Low</option>
            <option value="moderate">Moderate</option>
            <option value="high">High</option>
        </select><br><br>
        <input type="submit" value="Log Exercise">
    </form>
</body>
</html>
