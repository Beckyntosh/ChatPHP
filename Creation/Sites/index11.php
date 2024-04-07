
<?php
// Define MySQL connection parameters
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

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    genre VARCHAR(50) NOT NULL,
    decade VARCHAR(20) NOT NULL,
    info TEXT,
    reg_date TIMESTAMP
    )";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS songs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_id INT(6) UNSIGNED,
    title VARCHAR(50) NOT NULL,
    album VARCHAR(50),
    year INT(4),
    info TEXT,
    reg_date TIMESTAMP,
    FOREIGN KEY (artist_id) REFERENCES artists(id)
    )";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle search
$search_result = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $search = $conn->real_escape_string($_POST['search']);
    $sql = "SELECT artists.name AS artist_name, songs.title AS song_title, artists.genre, artists.decade
            FROM artists
            JOIN songs ON artists.id = songs.artist_id
            WHERE artists.genre LIKE '%{$search}%' OR artists.decade LIKE '%{$search}%'
            ORDER BY artists.name ASC";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $search_result[] = $row;
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Music and Artist Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        .search { margin-bottom: 20px; }
        .search input[type="text"] { width: calc(100% - 100px); }
        .search input[type="submit"] { width: 90px; }
        .results { margin-top: 20px; }
    </style>
</head>
<body>

<div class="container">
    <h1>Music and Artist Search</h1>
    <form action="" method="post" class="search">
        <input type="text" name="search" placeholder="Search for genres, decades...">
        <input type="submit" value="Search">
    </form>

    <?php if (!empty($search_result)): ?>
    <div class="results">
        <h2>Results:</h2>
        <ul>
            <?php foreach ($search_result as $row): ?>
                <li><?php echo htmlspecialchars($row['artist_name']) . " - " . htmlspecialchars($row['song_title']) . " (" . htmlspecialchars($row['genre']) . ", " . htmlspecialchars($row['decade']) . ")"; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>
</div>

</body>
</html>
