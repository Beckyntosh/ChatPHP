<?php
// Database Configuration
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

// Creating the artist table if not exists
$artistTable = "CREATE TABLE IF NOT EXISTS artists (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  genre VARCHAR(50) NOT NULL,
  decade VARCHAR(50) NOT NULL
  )";

if ($conn->query($artistTable) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle search
$search = $_GET['search'] ?? '';
if (!empty($search)) {
    $searchTerms = explode(' ', $search);
    $genre = $searchTerms[0];
    $decade = end($searchTerms);

    $sql = "SELECT name FROM artists WHERE genre=? AND decade=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $genre, $decade);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
 $result = new stdClass();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Music and Artist Search</title>
</head>
<body>

<h1>Search for Music Artists</h1>
<form>
    <input type="text" name="search" placeholder="e.g., Jazz artists from the 1960s" />
    <button type="submit">Search</button>
</form>

<?php if (!empty($search)): ?>
    <h2>Results for '<?php echo htmlspecialchars($search); ?>'</h2>
    <?php if ($result->num_rows > 0): ?>
        <ul>
            <?php while($row = $result->fetch_assoc()): ?>
                <li><?php echo $row['name']; ?></li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>
<?php endif; ?>

</body>
</html>
<?php $conn->close(); ?>
