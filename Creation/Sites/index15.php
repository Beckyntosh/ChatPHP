<?php
// Set up connection variables
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
    name VARCHAR(50) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    decade VARCHAR(10) NOT NULL,
    reg_date TIMESTAMP
)";

$createSongsTable = "CREATE TABLE IF NOT EXISTS songs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_id INT(6) UNSIGNED,
    title VARCHAR(50) NOT NULL,
    release_year YEAR(4),
    FOREIGN KEY (artist_id) REFERENCES artists(id),
    reg_date TIMESTAMP
)";

if (!$conn->query($createArtistsTable) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

if (!$conn->query($createSongsTable) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect value of input field
    $searchQuery = $_POST['search'];
    $decade = '1960s'; // Define decade for demonstration purpose
    $genre = 'Jazz'; // Define genre for demonstration purpose
    
    // SQL query to fetch artists and songs based on search criteria
    $sql = "SELECT artists.name AS artist_name, songs.title, songs.release_year
            FROM artists
            JOIN songs ON artists.id = songs.artist_id
            WHERE artists.genre = '$genre' AND artists.decade = '$decade'";

    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Music and Artist Search</title>
</head>
<body>
    <h1>Search for Music Artists and Songs</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <input type="text" name="search" placeholder="Enter search keyword">
        <input type="submit" value="Search">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $result->num_rows > 0) {
        echo "<h2>Search Results:</h2>";
        echo "<ul>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<li>Artist: " . $row["artist_name"]. " - Song: " . $row["title"]. " (" . $row["release_year"].")</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No results found</p>";
    }
    $conn->close();
    ?>
</body>
</html>
