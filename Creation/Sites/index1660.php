<?php
// Database Connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if table exists, if not create it
$tableCheckQuery = "SHOW TABLES LIKE 'custom_exercises'";
$result = $conn->query($tableCheckQuery);
if ($result->num_rows == 0) {
    $createTable = "CREATE TABLE custom_exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(100) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(255),
    reg_date TIMESTAMP
    )";

    if ($conn->query($createTable) === TRUE) {
        echo ""; // Silently handle table creation
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Handle Post Request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exercise_name = $_POST['exercise_name'];
    $instructions = $_POST['instructions'];
    $video_url = $_POST['video_url'];

    $stmt = $conn->prepare("INSERT INTO custom_exercises (exercise_name, instructions, video_url) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $exercise_name, $instructions, $video_url);

    if ($stmt->execute() === TRUE) {
        echo "New exercise added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <title>Add Custom Exercise</title>
    <style>
        body { font-family: Arial; background-color: #121212; color: #00ff00; }
        .container { max-width: 600px; margin: auto; background-color: #222; padding: 20px; }
        input, textarea, button { width: 100%; margin: 10px 0; padding: 10px; }
        input, textarea { background-color: #fff; border: 1px solid #ddd; }
        button { background-color: #008f11; color: #fff; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Custom Exercise</h2>
        <form method="post">
            <input type="text" name="exercise_name" placeholder="Exercise Name" required>
            <textarea name="instructions" placeholder="Instructions" required></textarea>
            <input type="text" name="video_url" placeholder="Video URL" required>
            <button type="submit">Add Exercise</button>
        </form>
    </div>
</body>
</html>
