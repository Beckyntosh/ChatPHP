<?php
// Database configuration
define("MYSQL_ROOT_PSWD", 'root');
define("MYSQL_DB", 'my_database');
define("SERVERNAME", 'db');
define("USERNAME", 'root');

// Connect to MySQL Database
$conn = new mysqli(SERVERNAME, USERNAME, MYSQL_ROOT_PSWD, MYSQL_DB);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for custom exercises if not exists
$createTable = "CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(255),
    reg_date TIMESTAMP
)";
$conn->query($createTable);

// Handle POST data for new Exercise
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $instructions = $_POST["instructions"];
    $video_url = $_POST["video_url"];

    $stmt = $conn->prepare("INSERT INTO custom_exercises (title, instructions, video_url) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $instructions, $video_url);

    if ($stmt->execute()) {
        echo "<p>New exercise added successfully!</p>";
    } else {
        echo "<p>Error adding exercise: " . $conn->error . "</p>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Custom Exercise</title>
</head>
<body>
    <h2>Add a Custom Exercise to Your Fitness Routine</h2>
    <form action="" method="post">
        <label for="title">Exercise Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        <label for="instructions">Instructions:</label><br>
        <textarea id="instructions" name="instructions" required></textarea><br><br>
        <label for="video_url">Video URL (optional):</label><br>
        <input type="text" id="video_url" name="video_url"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
