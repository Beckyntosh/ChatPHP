<?php

// DB connection settings
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

// Create the Artist and Music tables if they don't exist
$createArtistTable = "CREATE TABLE IF NOT EXISTS Artists (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
genre VARCHAR(30) NOT NULL,
decade VARCHAR(20) NOT NULL,
reg_date TIMESTAMP
)";

$createMusicTable = "CREATE TABLE IF NOT EXISTS Music (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artist_id INT(6) UNSIGNED,
title VARCHAR(50) NOT NULL,
year INT(4) NOT NULL,
FOREIGN KEY (artist_id) REFERENCES Artists(id)
)";

if ($conn->query($createArtistTable) === TRUE && $conn->query($createMusicTable) === TRUE) {
  // Tables created successfully or already exist
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle the search query if submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
  $searchTerm = "%{$_POST['search']}%";
  $decade = "1960";
  $genre = "Jazz";

  $sql = "SELECT Artists.name, Music.title, Music.year FROM Artists INNER JOIN Music ON Artists.id = Music.artist_id WHERE Artists.genre=? AND Artists.decade=? AND (Artists.name LIKE ? OR Music.title LIKE ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssss", $genre, $decade, $searchTerm, $searchTerm);
  $stmt->execute();
  $result = $stmt->get_result();

  $searchResults = $result->fetch_all(MYSQLI_ASSOC);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Music and Artist Search</title>
</head>
<body>
    <h1>Music and Artist Search</h1>
    <form method="post" action="">
        <input type="text" name="search" placeholder="Search for Artists or Music">
        <input type="submit" value="Search">
    </form>

<?php if (!empty($searchResults)): ?>
    <h2>Search Results:</h2>
    <table>
        <thead>
            <tr>
                <th>Artist</th>
                <th>Title</th>
                <th>Year</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($searchResults as $result): ?>
            <tr>
                <td><?php echo htmlspecialchars($result['name']); ?></td>
                <td><?php echo htmlspecialchars($result['title']); ?></td>
                <td><?php echo htmlspecialchars($result['year']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
    <p>No results found.</p>
<?php endif; ?>
</body>
</html>

<?php
$conn->close();
?>
