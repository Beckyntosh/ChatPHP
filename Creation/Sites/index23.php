<?php
// Define MySQL connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Establish MySQL connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create artist and song tables if they do not exist
$createArtistsTable = "CREATE TABLE IF NOT EXISTS artists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    genre VARCHAR(50),
    decade VARCHAR(20),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$createSongsTable = "CREATE TABLE IF NOT EXISTS songs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    artist_id INT,
    title VARCHAR(255) NOT NULL,
    album VARCHAR(255),
    year YEAR,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (artist_id) REFERENCES artists(id) ON DELETE CASCADE
)";

// Execute table creation queries
if (!$conn->query($createArtistsTable)) {
    echo "Error creating artists table: " . $conn->error;
}

if (!$conn->query($createSongsTable)) {
    echo "Error creating songs table: " . $conn->error;
}

// Search functionality
$searchResults = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['searchTerm'])) {
    $searchTerm = $conn->real_escape_string($_POST['searchTerm']);
    $searchQuery = "SELECT artists.name AS artist_name, songs.title AS song_title, songs.album, songs.year
                    FROM artists
                    JOIN songs ON artists.id = songs.artist_id
                    WHERE artists.genre LIKE '%{$searchTerm}%' OR artists.decade LIKE '%{$searchTerm}%'
                    GROUP BY songs.id
                    ORDER BY artists.name ASC";

    $result = $conn->query($searchQuery);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $searchResults[] = $row;
        }
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music and Artist Search</title>
    <style>
        body { font-family: 'Arial', sans-serif; background-color: #f4f4f4; color: #333; }
        .container { width: 80%; margin: 20px auto; padding: 20px; background-color: #fff; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .search-box { display: flex; margin-bottom: 20px; }
        .search-box input[type="text"] { flex-grow: 1; padding: 10px; border: 1px solid #ddd; margin-right: 5px; }
        .search-box input[type="submit"] { padding: 10px 20px; border: none; background-color: #007bff; color: #fff; cursor: pointer; }
        .search-box input[type="submit"]:hover { background-color: #0056b3; }
        .search-results ul { list-style-type: none; padding: 0; }
        .search-results ul li { padding: 10px; border-bottom: 1px solid #eee; }
        .search-results ul li:last-child { border-bottom: none; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Music and Artist Search</h1>
        <form action="" method="post" class="search-box">
            <input type="text" name="searchTerm" placeholder="Enter genre, decade, or artist name...">
            <input type="submit" value="Search">
        </form>
        <?php if (!empty($searchResults)): ?>
            <div class="search-results">
                <h2>Results</h2>
                <ul>
                    <?php foreach ($searchResults as $result): ?>
                        <li><?php echo htmlspecialchars($result['artist_name']) . ' - ' . htmlspecialchars($result['song_title']) . ' (' . htmlspecialchars($result['album']) . ', ' . htmlspecialchars($result['year']) . ')'; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
