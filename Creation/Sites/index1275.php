<?php
// Database connection setup
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if table exists, if not, create it
$sql = "CREATE TABLE IF NOT EXISTS exercise_log (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(50) NOT NULL,
    duration INT(10),
    intensity VARCHAR(30),
    log_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle the form submission
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["exercise_name"])) {
    $exerciseName = $_POST["exercise_name"];
    $duration = $_POST["duration"];
    $intensity = $_POST["intensity"];

    $stmt = $conn->prepare("INSERT INTO exercise_log (exercise_name, duration, intensity) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $exerciseName, $duration, $intensity);

    if($stmt->execute()) {
        echo "<p>Exercise logged successfully!</p>";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise Log</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { display: flex; flex-direction: column; width: 300px; }
        label, input, button { margin: 10px 0; }
    </style>
</head>
<body>
<h2>Add Exercise to Digital Workout Log</h2>
<form method="POST">
    <label for="exercise_name">Exercise Name:</label>
    <input type="text" id="exercise_name" name="exercise_name" required>
    
    <label for="duration">Duration (minutes):</label>
    <input type="number" id="duration" name="duration" required>
    
    <label for="intensity">Intensity:</label>
    <select id="intensity" name="intensity" required>
        <option value="low">Low</option>
        <option value="moderate">Moderate</option>
        <option value="high">High</option>
    </select>

    <button type="submit">Log Exercise</button>
</form>
</body>
</html>
