<?php

// MySQL connection variables
$servername = "db";
$database = "my_database";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create exercise table if it does not exist
$exerciseTableSql = "CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
)";

if (!$conn->query($exerciseTableSql) === TRUE) {
    echo "Error creating the table: " . $conn->error;
}

// Inserting provided data into the table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $instructions = $_POST['instructions'];
    $video_url = $_POST['video_url'];

    $insertExerciseSql = "INSERT INTO custom_exercises (title, instructions, video_url)
    VALUES (?, ?, ?)";

    $stmt = $conn->prepare($insertExerciseSql);
    $stmt->bind_param("sss", $title, $instructions, $video_url);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insertExerciseSql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Custom Exercise</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        input, textarea, button { width: 100%; margin-bottom: 10px; padding: 8px; }
        label { font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h2>Add Custom Exercise</h2>
    <form action="" method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" required>
        
        <label for="instructions">Instructions:</label>
        <textarea name="instructions" rows="5" required></textarea>
        
        <label for="video_url">Video URL:</label>
        <input type="text" name="video_url" required>
        
        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>
