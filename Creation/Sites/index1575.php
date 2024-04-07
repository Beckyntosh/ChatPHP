<?php
// Simple PHP script for an Online Art Gallery Entry System
// For educational/research purposes

// Database connection variables
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

// Attempt to create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS artworks (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(50) NOT NULL,
    artwork_title VARCHAR(100) NOT NULL,
    creation_date DATE,
    description TEXT,
    image_url VARCHAR(255),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture posted values
    $artist_name = $_POST['artist_name'];
    $artwork_title = $_POST['artwork_title'];
    $creation_date = $_POST['creation_date'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO artworks (artist_name, artwork_title, creation_date, description, image_url) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $artist_name, $artwork_title, $creation_date, $description, $image_url);

    // Execute statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Art Gallery Entry</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        form { display: flex; flex-direction: column; }
        label { margin-top: 10px; }
        input, textarea { margin-top: 5px; }
        button { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Artwork</h2>
        <form method="post" action="">
            <label for="artist_name">Artist Name:</label>
            <input type="text" id="artist_name" name="artist_name" required>

            <label for="artwork_title">Artwork Title:</label>
            <input type="text" id="artwork_title" name="artwork_title" required>

            <label for="creation_date">Creation Date:</label>
            <input type="date" id="creation_date" name="creation_date">

            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>

            <label for="image_url">Image URL:</label>
            <input type="text" id="image_url" name="image_url">

            <button type="submit">Upload</button>
        </form>
    </div>
</body>
</html>
