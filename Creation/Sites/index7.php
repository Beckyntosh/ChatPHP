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

// Create tables if they do not exist
$createArtistsTable = "CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    genre VARCHAR(50) NOT NULL,
    decade CHAR(4),
    reg_date TIMESTAMP
)";

$createSongsTable = "CREATE TABLE IF NOT EXISTS songs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    artist_id INT(6) UNSIGNED,
    release_year YEAR,
    FOREIGN KEY (artist_id) REFERENCES artists(id),
    reg_date TIMESTAMP
)";

if ($conn->query($createArtistsTable) === TRUE && $conn->query($createSongsTable) === TRUE) {
  echo "Tables created successfully.";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchTerm = $_POST["search"];

    // Assuming search term is like 'Jazz artists from the 1960s'
    preg_match_all('/([^ ]+) artists from the (\d+)s/', $searchTerm, $matches);
    $genre = $matches[1][0];
    $decade = $matches[2][0] . '0';

    $stmt = $conn->prepare("SELECT artists.name, songs.title FROM artists JOIN songs ON artists.id = songs.artist_id WHERE artists.genre=? AND LEFT(decode, 3)=?");
    $stmt->bind_param("ss", $genre, $decade);
    $stmt->execute();
    $result = $stmt->get_result();
    $output = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Music and Artist Search</title>
</head>
<body>
    <h1>Music and Artist Search</h1>
    <form method="post">
        <label for="search">Search: </label>
        <input type="text" id="search" name="search" placeholder="e.g., Jazz artists from the 1960s">
        <button type="submit">Search</button>
    </form>

    <?php if (!empty($output)): ?>
        <h2>Results:</h2>
        <ul>
            <?php foreach ($output as $row): ?>
                <li><?php echo htmlspecialchars($row["name"] . " - " . $row["title"]); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
