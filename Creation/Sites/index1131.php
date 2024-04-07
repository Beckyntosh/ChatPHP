<?php
// Establish database connection
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

// Create the tables if they don't exist
$sql = "CREATE TABLE IF NOT EXISTS Artists (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
genre VARCHAR(30) NOT NULL,
decade VARCHAR(10) NOT NULL
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS Songs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artist_id INT(6) UNSIGNED,
title VARCHAR(50) NOT NULL,
FOREIGN KEY (artist_id) REFERENCES Artists(id)
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Search functionality
$search = $_GET['search'] ?? '';

if (!empty($search)) {
    $sql = "SELECT a.name, a.genre, s.title FROM Artists a 
            JOIN Songs s ON a.id = s.artist_id 
            WHERE a.genre LIKE '%".$conn->real_escape_string($search)."%' 
            OR a.decade = '".$conn->real_escape_string($search)."'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Artist: " . $row["name"]. " - Genre: " . $row["genre"]. " - Song: " . $row["title"]. "<br>";
        }
    } else {
        echo "No results found";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Music and Artist Search</title>
</head>
<body>
    <h1>Search for Music and Artists</h1>
    <form action="" method="GET">
        <input type="text" name="search" placeholder="Search for artists or genre...">
        <input type="submit" value="Search">
    </form>
</body>
</html>
