<?php

$host = "db";
$dbname = "my_database";
$username = "root";
$password = "root";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create exercise log table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS exercise_log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(255) NOT NULL,
    duration INT NOT NULL,
    intensity VARCHAR(50)
)";
if (!$conn->query($sql)) {
    die("Error creating table: " . $conn->error);
}

$message = "";

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["type"]) && isset($_POST["duration"]) && isset($_POST["intensity"])) {
    $type = $_POST["type"];
    $duration = $_POST["duration"];
    $intensity = $_POST["intensity"];

    $stmt = $conn->prepare("INSERT INTO exercise_log (type, duration, intensity) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $type, $duration, $intensity);

    if ($stmt->execute()) {
        $message = "Exercise logged successfully!";
    } else {
        $message = "Error logging exercise: " . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Exercise Log</title>
</head>
<body>
    <h2>Add Exercise to Digital Workout Log</h2>
    <form method="post" action="">
        <label for="type">Exercise Type:</label><br>
        <input type="text" id="type" name="type" required><br>
        <label for="duration">Duration (minutes):</label><br>
        <input type="number" id="duration" name="duration" required><br>
        <label for="intensity">Intensity:</label><br>
        <select id="intensity" name="intensity">
            <option value="low">Low</option>
            <option value="moderate">Moderate</option>
            <option value="high">High</option>
        </select><br>
        <input type="submit" value="Log Exercise">
    </form>
    <?php if($message != ""): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
</body>
</html>
