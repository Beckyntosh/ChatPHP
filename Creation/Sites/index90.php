<?php
// Ensure errors are displayed
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

// Create tables if they don't exist
$createTablesSQL = "
    CREATE TABLE IF NOT EXISTS artists (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL
    );

    CREATE TABLE IF NOT EXISTS albums (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        artist_id INT,
        FOREIGN KEY (artist_id) REFERENCES artists(id)
    );

    CREATE TABLE IF NOT EXISTS songs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        album_id INT,
        FOREIGN KEY (album_id) REFERENCES albums(id)
    );
";

if (!$conn->multi_query($createTablesSQL)) {
    echo "Error creating tables: " . $conn->error;
}
$conn->close();

// Function to search for music
function searchMusic($query) {
    global $servername, $username, $password, $dbname;

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT songs.title AS song_title, albums.title AS album_title, artists.name AS artist_name 
            FROM songs 
            JOIN albums ON songs.album_id = albums.id 
            JOIN artists ON albums.artist_id = artists.id 
            WHERE songs.title LIKE ? OR albums.title LIKE ? OR artists.name LIKE ?";
    
    $stmt = $conn->prepare($sql);
    $searchTerm = "%" . $query . "%";
    $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p><b>Song:</b> " . $row["song_title"] . " - <b>Album:</b> " . $row["album_title"] . " - <b>Artist:</b> " . $row["artist_name"] . "</p>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
}

// Check for search query
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Music and Artist Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 10px;
            margin-right: 10px;
            width: 300px;
        }
        input[type="submit"] {
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <h1>Music and Artist Search</h1>
    <form action="" method="get">
        <input type="text" name="search" placeholder="Search for songs, albums, or artists">
        <input type="submit" value="Search">
    </form>
<?php
if (!empty($searchQuery)) {
    searchMusic($searchQuery);
}
?>
</body>
</html>