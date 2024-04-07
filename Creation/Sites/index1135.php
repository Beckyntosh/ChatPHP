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

// Create tables if they don't exist
$createArtistsTable = "CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    decade CHAR(4),
    reg_date TIMESTAMP
)";

$createSongsTable = "CREATE TABLE IF NOT EXISTS songs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    artist_id INT(6) UNSIGNED,
    release_year YEAR(4),
    FOREIGN KEY (artist_id) REFERENCES artists(id),
    reg_date TIMESTAMP
)";

if ($conn->query($createArtistsTable) === TRUE && $conn->query($createSongsTable) === TRUE) {
    // Tables created successfully or already exists
} else {
    echo "Error creating tables: " . $conn->error;
}


// HTML and PHP mixed for form submission
?>
<!DOCTYPE html>
<html>
<head>
    <title>Music and Artist Search</title>
    <style>
        body {font-family: Arial, sans-serif;}
        .container {margin: 20px;}
        .results {margin-top: 20px;}
    </style>
</head>
<body>
<div class="container">
    <h1>Music and Artist Search</h1>
    <form method="post">
        <input type="text" name="searchTerm" placeholder="Search for artists or songs">
        <input type="submit" value="Search">
    </form>
    <div class="results">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
            $sql = "SELECT a.name, a.genre, s.title, s.release_year
                    FROM artists a
                    JOIN songs s ON a.id = s.artist_id
                    WHERE a.decade = '1960s' AND a.genre LIKE '%$searchTerm%' OR a.name LIKE '%$searchTerm%' OR s.title LIKE '%$searchTerm%'
                    ORDER BY a.name, s.release_year";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                echo "<ul>";
                while($row = $result->fetch_assoc()) {
                    echo "<li>Artist: " . $row["name"] . ", Genre: " . $row["genre"] . ", Song: " . $row["title"] . ", Year: " . $row["release_year"] . "</li>";
                }
                echo "</ul>";
            } else {
                echo "0 results found";
            }
        }
        $conn->close();
        ?>
    </div>
</div>
</body>
</html>

