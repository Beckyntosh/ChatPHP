<?php
// Database connection
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

// Create artwork table if not exists
$sql = "CREATE TABLE IF NOT EXISTS artworks (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artist_name VARCHAR(255) NOT NULL,
title VARCHAR(255) NOT NULL,
description TEXT NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle artwork upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $artist_name = $_POST['artistName'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    $query = $conn->prepare("INSERT INTO artworks (artist_name, title, description) VALUES (?, ?, ?)");
    $query->bind_param("sss", $artist_name, $title, $description);
    
    if($query->execute()) {
        echo "<p>Artwork uploaded successfully.</p>";
    } else {
        echo "<p>Error uploading artwork: " . $conn->error . "</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Gallery Entry</title>
</head>
<body>
    <h2>Upload Artwork</h2>
    <form action="" method="post">
        <label for="artistName">Artist Name:</label><br>
        <input type="text" id="artistName" name="artistName" required><br>
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br>
        <input type="submit" value="Upload Artwork">
    </form>
</body>
</html>
