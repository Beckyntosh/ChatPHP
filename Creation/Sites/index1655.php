<?php
// Simple web app for adding custom exercises to a fitness app
// Frontend (HTML) + Backend (PHP) in a single file

// Database connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for custom exercises if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    instructions TEXT NOT NULL,
    video_url VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === FALSE) {
    die("Error creating table: " . $conn->error);
}

// Handle the post request to add a custom exercise
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $instructions = $_POST["instructions"];
    $video_url = $_POST["video_url"];

    $sql = "INSERT INTO custom_exercises (name, instructions, video_url) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if ($stmt === FALSE) {
        die("Error: " . $sql . "<br>" . $conn->error);
    }

    $stmt->bind_param("sss", $name, $instructions, $video_url);
    $stmt->execute();
    $stmt->close();

    echo '<p style="color:green;">Custom Exercise Added Successfully!</p>';
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Custom Exercise</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e68c;
            color: #333;
        }
        .container {
            width: 90%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add a New Custom Exercise</h2>
    <form action="" method="post">
        <div>
            <label for="name">Exercise Name:</label><br>
            <input type="text" id="name" name="name" required><br>
        </div>
        <div>
            <label for="instructions">Instructions:</label><br>
            <textarea id="instructions" name="instructions" required></textarea><br>
        </div>
        <div>
            <label for="video_url">Video URL:</label><br>
            <input type="text" id="video_url" name="video_url" required><br>
        </div>
        <div>
            <input type="submit" value="Add Exercise">
        </div>
    </form>
</div>

</body>
</html>
