<?php
// Set up connection constants
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$link = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . $link->connect_error);
}

// Check if the search request is posted
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    // Get the search term from POST request
    $searchTerm = $link->real_escape_string(trim($_POST['search']));

    // SQL query to fetch artists information based on search
    $sql = "SELECT artist_name, genre, year FROM artists WHERE genre LIKE '%{$searchTerm}%' OR year LIKE '%{$searchTerm}%'";

    // Execute the query
    $result = $link->query($sql);
} 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Music and Artist Search</title>
</head>
<body>
    <h1>Search for Music and Artists</h1>
    <form method="post">
        <input type="text" name="search" placeholder="e.g., Jazz artists from the 1960s" required>
        <button type="submit">Search</button>
    </form>

    <?php if(isset($result) && $result->num_rows > 0): ?>
        <h2>Search Results:</h2>
        <div>
            <ul>
                <?php while($row = $result->fetch_assoc()): ?>
                    <li><?php echo htmlspecialchars($row['artist_name']) . " - " . htmlspecialchars($row['genre']) . " (" . htmlspecialchars($row['year']) . ")"; ?></li>
                <?php endwhile; ?>
            </ul>
        </div>
    <?php elseif(isset($result)): ?>
        <p>No artists found matching your search criteria.</p>
    <?php endif; ?>

</body>
</html>
<?php
$link->close();
?>
