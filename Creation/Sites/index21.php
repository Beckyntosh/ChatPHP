<?php
// Connection to the database
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Creating the tables if they do not exist
$createTables = "
CREATE TABLE IF NOT EXISTS Artists (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    genre VARCHAR(100),
    decade VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS Songs (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    artist_id INT UNSIGNED,
    release_year YEAR,
    FOREIGN KEY (artist_id) REFERENCES Artists(id)
);
";

if (!$conn->multi_query($createTables)) {
    echo "Error creating tables: " . $conn->error;
}

$conn->close();

// Handling the search
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchTerm = $_POST['searchTerm'];
    
    // Reconnect to execute search
    $conn = new mysqli($servername, $username, $password, $database);
    $sql = "SELECT Artists.name AS artistName, Songs.title AS songTitle 
            FROM Artists 
            JOIN Songs ON Artists.id = Songs.artist_id 
            WHERE Artists.genre = 'Jazz' AND Artists.decade = '1960s' AND Artists.name LIKE ?";

    $stmt = $conn->prepare($sql);
    $likeSearchTerm = "%$searchTerm%";
    $stmt->bind_param("s", $likeSearchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Music Collection Search</title>
</head>
<body>
<h1>Search for Jazz Artists from the 1960s</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="searchTerm">Search for artists:</label>
    <input type="text" id="searchTerm" name="searchTerm">
    <input type="submit" value="Search">
</form>

<?php if (isset($result) && $result->num_rows > 0): ?>
    <h2>Results:</h2>
    <ul>
        <?php while($row = $result->fetch_assoc()): ?>
            <li><?php echo "Artist: " . htmlspecialchars($row["artistName"]) . ", Song: " . htmlspecialchars($row["songTitle"]); ?></li>
        <?php endwhile; ?>
    </ul>
<?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
    <p>No results found.</p>
<?php endif; ?>
</body>
</html>
