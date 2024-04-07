<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music and Artist Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFD700;
            color: #000;
            text-align: center;
        }
        .container {
            margin-top: 20px;
        }
        input[type=text], select, button {
            padding: 10px;
            margin: 10px;
            border: 1px solid #ddd;
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Music and Artist Search</h1>
    <form method="POST">
        <input type="text" name="searchQuery" placeholder="Search for Songs, Albums, Artists...">
        <button type="submit" name="search">Search</button>
    </form>

<?php

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

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS artists (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL
)";

$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS albums (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
artist_id INT(6),
FOREIGN KEY (artist_id) REFERENCES artists(id)
)";

$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS songs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
album_id INT(6),
FOREIGN KEY (album_id) REFERENCES albums(id)
)";

$conn->query($sql);

if(isset($_POST['search'])) {
    $searchQuery = $conn->real_escape_string($_POST['searchQuery']);

    //complex query for searching songs, albums, and artists
    $sql = "SELECT songs.title AS song_title, albums.title AS album_title, artists.name AS artist_name 
            FROM songs 
            JOIN albums ON songs.album_id = albums.id 
            JOIN artists ON albums.artist_id = artists.id 
            WHERE songs.title LIKE '%$searchQuery%' OR albums.title LIKE '%$searchQuery%' OR artists.name LIKE '%$searchQuery%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>Song</th><th>Album</th><th>Artist</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["song_title"]."</td><td>".$row["album_title"]."</td><td>".$row["artist_name"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No results found.</p>";
    }
}

$conn->close();
?>

</div>

</body>
</html>