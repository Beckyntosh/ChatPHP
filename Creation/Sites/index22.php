<?php

// Simple Music and Artist Search Web Application for a Shoes Website

// Database configuration
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

// Create tables if they do not exist
$createArtistsTable = "CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    decade VARCHAR(20) NOT NULL
)";

$createSongsTable = "CREATE TABLE IF NOT EXISTS songs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    artist_id INT(6) UNSIGNED,
    FOREIGN KEY (artist_id) REFERENCES artists(id)
)";

if (!$conn->query($createArtistsTable) || !$conn->query($createSongsTable)) {
    echo "Error creating table: " . $conn->error;
}

// Handle search
$search_results = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["search"])) {
    $search = $conn->real_escape_string($_POST["search"]);
    
    $sql = "SELECT * FROM artists WHERE genre LIKE '%jazz%' AND decade='1960s' AND name LIKE '%$search%'";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $search_results[] = $row;
        }
    } else {
        echo "0 results";
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #f0f0f0;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Search for Jazz Artists from the 1960s</h1>
    <form action="" method="post">
        <input type="text" name="search" placeholder="Enter artist name...">
        <button type="submit">Search</button>
    </form>
    
    <?php if(!empty($search_results)): ?>
        <ul>
            <?php foreach($search_results as $artist): ?>
                <li><?php echo htmlentities($artist['name']); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
</body>
</html>
