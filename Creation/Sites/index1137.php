<?php
// Connection to the database
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
  genre VARCHAR(50),
  era VARCHAR(50)
)";

$createSongsTable = "CREATE TABLE IF NOT EXISTS songs (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  artist_id INT(6) UNSIGNED,
  title VARCHAR(100) NOT NULL,
  year INT(4),
  FOREIGN KEY (artist_id) REFERENCES artists(id)
)";

$conn->query($createArtistsTable);
$conn->query($createSongsTable);

// Check if the search query is set
if (isset($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <title>Music and Artist Search</title>
    </head>
    <body>
    <h2>Search Results</h2>
    <?php
    // Search query
    $sql = "SELECT artists.name AS artist, songs.title, songs.year 
            FROM artists 
            JOIN songs ON artists.id = songs.artist_id 
            WHERE artists.genre='Jazz' AND artists.era='1960s' AND artists.name LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "Artist: " . $row["artist"]. " - Song: " . $row["title"]. " (" . $row["year"]. ")<br>";
        }
    } else {
        echo "0 results";
    }
    ?>
    <a href="index.php">Back to search</a>
    </body>
    </html>
    <?php
} else {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
      <title>Music and Artist Search</title>
    </head>
    <body>

    <h2>Search for Jazz artists from the 1960s</h2>
    <form action="" method="get">
      <input type="text" name="search" placeholder="Enter artist name...">
      <input type="submit" value="Search">
    </form>

    </body>
    </html>
    <?php
}

$conn->close();
?>
