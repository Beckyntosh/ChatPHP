<?php
// Establish connection to the database
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

// If a search term is received, search for artists or music
$searchTerm = $_GET['search'] ?? '';

if ($searchTerm) {
    $searchTerm = $conn->real_escape_string($searchTerm);
    $query = "SELECT artists.name AS artist_name, music.title AS music_title, music.genre, music.release_year 
              FROM music 
              INNER JOIN artists ON music.artist_id = artists.id 
              WHERE music.genre LIKE '%Jazz%' AND music.release_year BETWEEN 1960 AND 1969 AND (artists.name LIKE '%$searchTerm%' OR music.title LIKE '%$searchTerm%')";
    
    $result = $conn->query($query);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Music and Artist Search</title>
</head>
<body>
    <h1>Search for Jazz Artists from the 1960s</h1>
    <form action="" method="GET">
        <input type="text" name="search" placeholder="Enter artist or music title..." value="<?php echo htmlspecialchars($searchTerm); ?>">
        <button type="submit">Search</button>
    </form>
    
    <?php if (isset($result) && $result->num_rows > 0): ?>
        <h2>Results:</h2>
        <ul>
            <?php while($row = $result->fetch_assoc()): ?>
                <li><?php echo htmlspecialchars($row['artist_name']); ?> - <?php echo htmlspecialchars($row['music_title']); ?> (<?php echo htmlspecialchars($row['genre']); ?>, <?php echo htmlspecialchars($row['release_year']); ?>)</li>
            <?php endwhile; ?>
        </ul>
    <?php elseif (isset($result)): ?>
        <p>No results found.</p>
    <?php endif; ?>
    
</body>
</html>

<?php
$conn->close();
?>
