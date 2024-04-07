// PARAMETERS: Function: Music and Artist Search: create an example search function for a music collection website. Example: User searches for 'Jazz artists from the 1960s' Product: Spirits Style: real-life
<?php
// Simple standalone music and artist search web application in PHP with MySQL

// Constants
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DATABASE', 'my_database');
define('MYSQL_SERVER', 'db');

// Connect to MySQL database
$mysqli = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Create tables if they do not exist
$createArtistsTable = "CREATE TABLE IF NOT EXISTS artists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    genre VARCHAR(100) NOT NULL,
    era VARCHAR(50) NOT NULL
)";

$createAlbumsTable = "CREATE TABLE IF NOT EXISTS albums (
    id INT AUTO_INCREMENT PRIMARY KEY,
    artist_id INT,
    title VARCHAR(255) NOT NULL,
    year INT NOT NULL,
    FOREIGN KEY(artist_id) REFERENCES artists(id)
)";

$mysqli->query($createArtistsTable);
$mysqli->query($createAlbumsTable);

// Example data insertion for testing purposes
$artists = [
    "(1, 'Miles Davis', 'Jazz', '1960s')",
    "(2, 'John Coltrane', 'Jazz', '1960s')"
];
$albums = [
    "(1, 1, 'Kind of Blue', 1959)",
    "(2, 2, 'A Love Supreme', 1965)"
];

foreach ($artists as $artist) {
    $mysqli->query("INSERT INTO artists (id, name, genre, era) VALUES $artist ON DUPLICATE KEY UPDATE name=VALUES(name)");
}

foreach ($albums as $album) {
    $mysqli->query("INSERT INTO albums (id, artist_id, title, year) VALUES $album ON DUPLICATE KEY UPDATE title=VALUES(title)");
}

// Handle search
$searchQuery = '';
$results = [];
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    $searchQuery = $mysqli->real_escape_string($_GET['search']);
    $sql = "SELECT a.name, a.genre, a.era, ab.title, ab.year 
            FROM artists a
            JOIN albums ab ON a.id = ab.artist_id
            WHERE a.genre LIKE '%$searchQuery%' OR a.era LIKE '%$searchQuery%'
            ORDER BY a.name";

    $result = $mysqli->query($sql);
    if ($result) {
        while($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    }
}

// HTML and PHP mixed
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music and Artist Search</title>
</head>
<body>
    <h1>Music and Artist Search</h1>
    <form action="" method="GET">
        <input type="text" name="search" placeholder="Search for artists or eras..." value="<?= htmlspecialchars($searchQuery) ?>">
        <input type="submit" value="Search">
    </form>
    <?php if(!empty($results)): ?>
        <ul>
        <?php foreach($results as $result): ?>
            <li><?= htmlspecialchars($result['name']) ?>: <?= htmlspecialchars($result['title']) ?> (<?= htmlspecialchars($result['year']) ?>) [<?= htmlspecialchars($result['genre']) ?>, <?= htmlspecialchars($result['era']) ?>]</li>
        <?php endforeach; ?>
        </ul>
    <?php elseif($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])): ?>
        <p>No results found for "<?= htmlspecialchars($searchQuery) ?>"</p>
    <?php endif; ?>
</body>
</html>

<?php
$mysqli->close();
?>
