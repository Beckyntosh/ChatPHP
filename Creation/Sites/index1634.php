<?php
// Database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Exercise Table
$createTable = "CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($createTable) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Data submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $instructions = $_POST['instructions'];
    $video_url = $_POST['video_url'];
    
    $sql = "INSERT INTO custom_exercises (name, instructions, video_url) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $instructions, $video_url);
    $stmt->execute();

    echo "New exercise added successfully";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Custom Exercise</title>
</head>
<body>
    <h2>Add Your Custom Exercise</h2>
    <form action="" method="post">
        <label for="name">Exercise Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="instructions">Instructions:</label><br>
        <textarea id="instructions" name="instructions" rows="4" cols="50" required></textarea><br>
        <label for="video_url">Video URL:</label><br>
        <input type="text" id="video_url" name="video_url" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
