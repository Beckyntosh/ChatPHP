<?php
// Exercise Log Web Application Code

// Database connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Establish MySQL connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create ExerciseLog table if it does not exist
$tableQuery = "CREATE TABLE IF NOT EXISTS ExerciseLog (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exerciseType VARCHAR(30) NOT NULL,
    duration INT(10),
    intensity VARCHAR(30),
    logDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($tableQuery)) {
    echo "Error creating table: " . $conn->error;
}

// Insert an exercise log
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["exerciseType"])) {
    $exerciseType = $_POST["exerciseType"];
    $duration = $_POST["duration"];
    $intensity = $_POST["intensity"];

    $insertQuery = $conn->prepare("INSERT INTO ExerciseLog (exerciseType, duration, intensity) VALUES (?, ?, ?)");
    $insertQuery->bind_param("sis", $exerciseType, $duration, $intensity);

    if ($insertQuery->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insertQuery->error;
    }

    $insertQuery->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Exercise to Workout Log</title>
</head>
<body style="font-family: 'Times New Roman', Times, serif; background-color: #efebe9; color: #1a237e;">
    <h2>Add Exercise to Your Digital Workout Log</h2>

    <form action="" method="post">
        <label for="exerciseType">Exercise Type:</label><br>
        <input type="text" id="exerciseType" name="exerciseType" required><br>

        <label for="duration">Duration (in minutes):</label><br>
        <input type="number" id="duration" name="duration" required><br>

        <label for="intensity">Intensity:</label><br>
        <select id="intensity" name="intensity">
            <option value="low">Low</option>
            <option value="moderate">Moderate</option>
            <option value="high">High</option>
        </select><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
