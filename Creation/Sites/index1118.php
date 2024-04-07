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

// Create artist and genre tables if they do not exist
$sql = "CREATE TABLE IF NOT EXISTS genre (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === FALSE) {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS artist (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    genre_id INT(6) UNSIGNED,
    debut DECIMAL(4,0),
    reg_date TIMESTAMP,
    FOREIGN KEY (genre_id) REFERENCES genre(id)
)";

if ($conn->query($sql) === FALSE) {
  echo "Error creating table: " . $conn->error;
}

$search_keyword = $_GET['search'] ?? '';

$sql = "SELECT artist.name AS artist_name, genre.name AS genre_name, artist.debut
        FROM artist
        JOIN genre ON artist.genre_id = genre.id
        WHERE genre.name LIKE '%" . $conn->real_escape_string($search_keyword) . "%' 
        OR artist.name LIKE '%" . $conn->real_escape_string($search_keyword) . "%' 
        OR CAST(artist.debut AS CHAR) LIKE '%" . $conn->real_escape_string($search_keyword) . "%'";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Music Collection Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, td, th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #04AA6D;
            color: white;
        }
        input[type='text'], button {
            padding: 10px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1>Music and Artist Search</h1>
    <form action="" method="get">
        <input type="text" name="search" placeholder="Try 'Jazz artists from the 1960s'" value="<?php echo htmlspecialchars($search_keyword); ?>">
        <button type="submit">Search</button>
    </form>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>Artist</th>
                <th>Genre</th>
                <th>Debut Year</th>
            </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['artist_name']); ?></td>
                <td><?php echo htmlspecialchars($row['genre_name']); ?></td>
                <td><?php echo htmlspecialchars($row['debut']); ?></td>
            </tr>
        <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>
</body>
</html>
<?php
$conn->close();
?>
