<?php
// Create connection
$conn = new mysqli('db', 'root', 'root', 'my_database');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Creating tables if not exists
$artistsTable = "CREATE TABLE IF NOT EXISTS artists (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
genre VARCHAR(30) NOT NULL,
year INT(4),
unique(name)
)";

$songsTable = "CREATE TABLE IF NOT EXISTS songs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artist_id INT(6) UNSIGNED,
title VARCHAR(50),
year INT(4),
FOREIGN KEY (artist_id) REFERENCES artists(id)
)";

$conn->query($artistsTable);
$conn->query($songsTable);

// Handling the search
$searchResult = [];
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['search'])) {
    $searchKey = $conn->real_escape_string($_POST['search']);
    $sql = "SELECT a.name AS artist_name, s.title, s.year FROM artists a
            JOIN songs s ON a.id = s.artist_id
            WHERE a.genre = 'Jazz' AND a.year BETWEEN 1960 AND 1969
            AND (a.name LIKE '%$searchKey%' OR s.title LIKE '%$searchKey%')";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $searchResult[] = $row;
        }
    } else {
        $searchResult[] = "0 results found";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Music and Artist Search</title>
</head>
<body>
<h2>Search for Jazz Artists from the 1960s</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" placeholder="Search artists or songs">
    <input type="submit" value="Search">
</form>

<?php
if (!empty($searchResult)) {
    echo "<ul>";
    foreach($searchResult as $item) {
        if(is_array($item)){
            echo "<li>".htmlspecialchars($item['artist_name'])." - ".htmlspecialchars($item['title'])." (".htmlspecialchars($item['year']).")</li>";
        }else{
            echo "<li>".htmlspecialchars($item)."</li>";
        }
    }
    echo "</ul>";
}
?>

</body>
</html>
