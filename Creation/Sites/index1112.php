<?php
// Simple Music and Artist Search Web Application
// IMPORTANT: This is a simplified example for educational purposes only.

$mysql_host = 'db';
$mysql_username = 'root';
$mysql_password = 'root';
$mysql_database = 'my_database';

// Connect to MySQL database
$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Create tables if they don't exist
$createArtistsTable = "CREATE TABLE IF NOT EXISTS artists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    genre VARCHAR(100) NOT NULL,
    decade VARCHAR(50)
)";

$createSongsTable = "CREATE TABLE IF NOT EXISTS songs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    artist_id INT,
    FOREIGN KEY(artist_id) REFERENCES artists(id)
)";

$mysqli->query($createArtistsTable);
$mysqli->query($createSongsTable);

// Search logic
$search_result = [];
if (isset($_GET['search'])) {
    $search_term = $mysqli->real_escape_string($_GET['search']);
    $query = "SELECT a.name AS artist_name, a.genre, a.decade, s.title AS song_title
              FROM artists a
              JOIN songs s ON a.id = s.artist_id
              WHERE a.genre LIKE '%$search_term%' OR a.decade LIKE '%$search_term%' OR a.name LIKE '%$search_term%'
              ORDER BY a.name";

    $result = $mysqli->query($query);

    while($row = $result->fetch_assoc()) {
        $search_result[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Music and Artist Search</title>
</head>
<body>

<form method="get">
    <input type="text" name="search" placeholder="Search for artists, genres, decades...">
    <input type="submit" value="Search">
</form>

<?php if (!empty($search_result)): ?>
    <table border="1">
        <thead>
        <tr>
            <th>Artist Name</th>
            <th>Genre</th>
            <th>Decade</th>
            <th>Song Title</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($search_result as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['artist_name']) ?></td>
                <td><?= htmlspecialchars($row['genre']) ?></td>
                <td><?= htmlspecialchars($row['decade']) ?></td>
                <td><?= htmlspecialchars($row['song_title']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php elseif(isset($_GET['search'])): ?>
    <p>No results found for <?= htmlspecialchars($_GET['search']) ?></p>
<?php endif; ?>

</body>
</html>

<?php
$mysqli->close();
?>
