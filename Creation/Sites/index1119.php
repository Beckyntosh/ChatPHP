<?php
$mysqli = new mysqli("db", "root", "root", "my_database");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Create tables if not exists
$createTables = "
CREATE TABLE IF NOT EXISTS artists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    genre VARCHAR(50) NOT NULL,
    debut_year INT
);
CREATE TABLE IF NOT EXISTS songs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    artist_id INT,
    title VARCHAR(255) NOT NULL,
    release_year INT,
    FOREIGN KEY(artist_id) REFERENCES artists(id)
);
";

if (!$mysqli->multi_query($createTables)) {
    echo "Error creating tables: " . $mysqli->error;
}

// Assuming tables are populated with relevant data...

$search = $_POST['search'] ?? '';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Music and Artist Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { margin: 20px; }
        .search-results { margin-top: 20px; }
        .artist, .song { margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Music and Artist Search</h1>
        <form method="POST">
            <input type="text" name="search" placeholder="Search for music or artists..." value="<?= htmlentities($search) ?>">
            <button type="submit">Search</button>
        </form>

        <div class="search-results">
            <?php
            if ($search) {
                $searchTerms = explode(' ', $search);
                $genre = "";
                $decadeStart = 0;
                $decadeEnd = 0;

                foreach ($searchTerms as $term) {
                    if (strtolower($term) == "jazz") $genre = "Jazz";
                    if (preg_match('/\d{4}s/', $term, $matches)) {
                        $decadeStart = (int)$matches[0];
                        $decadeEnd = $decadeStart + 9;
                    }
                }

                $query = "SELECT * FROM artists WHERE genre = ? AND debut_year BETWEEN ? AND ?";
                $stmt = $mysqli->prepare($query);
                $stmt->bind_param('sii', $genre, $decadeStart, $decadeEnd);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($artist = $result->fetch_assoc()) {
                        echo '<div class="artist"><strong>Artist:</strong> ' . htmlentities($artist['name']) . ' (' . htmlentities($artist['genre']) . ', Debut: ' . htmlentities($artist['debut_year']) . ')</div>';
                        $songsQuery = "SELECT * FROM songs WHERE artist_id = ?";
                        $songsStmt = $mysqli->prepare($songsQuery);
                        $songsStmt->bind_param('i', $artist['id']);
                        $songsStmt->execute();
                        $songsResult = $songsStmt->get_result();

                        while ($song = $songsResult->fetch_assoc()) {
                            echo '<div class="song"> - <strong>Song:</strong> ' . htmlentities($song['title']) . ' ('. htmlentities($song['release_year']).')</div>';
                        }
                    }
                } else {
                    echo '<div>No results found.</div>';
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
