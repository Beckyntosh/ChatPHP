<?php
// Connect to the database
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

// Create tables if they don't already exist
$artistsTable = "CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    decade CHAR(4)
)";
$conn->query($artistsTable);

$songsTable = "CREATE TABLE IF NOT EXISTS songs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    artist_id INT(6) UNSIGNED,
    FOREIGN KEY (artist_id) REFERENCES artists(id)
)";
$conn->query($songsTable);

// Check for POST request from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchQuery = $_POST['search'];
    $decade = "1960";
    $genre = "%Jazz%";

    // SQL query
    $stmt = $conn->prepare("SELECT artists.name, songs.title FROM artists INNER JOIN songs ON artists.id = songs.artist_id WHERE artists.decade = ? AND artists.genre LIKE ? AND artists.name LIKE ?");
    $stmt->bind_param("sss", $decade, $genre, $searchQuery);
    $stmt->execute();
    $result = $stmt->get_result();

    $searchResults = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($searchResults, $row);
        }
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Music and Artist Search</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #333; color: #fff; }
        .container { max-width: 650px; margin: auto; background-color: #444; padding: 20px; margin-top: 50px; border-radius: 8px; }
        input[type='text'], button { padding: 10px; margin-top: 10px; border-radius: 4px; }
        input[type='text'] { width: calc(100% - 122px); }
        button { cursor: pointer; background-color: #0051FF; color: white; border: none; width: 100px; }
        .results { margin-top: 20px; }
        .result-item { background-color: #555; padding: 10px; margin: 10px 0; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <form method="POST" action="">
            <input type="text" name="search" placeholder="Search for Jazz artists from the 1960s" required>
            <button type="submit">Search</button>
        </form>
        <div class="results">
            <?php if (isset($searchResults)) { ?>
                <?php foreach ($searchResults as $item) { ?>
                    <div class="result-item">
                        <strong>Artist:</strong> <?php echo $item['name']; ?> <br>
                        <strong>Song:</strong> <?php echo $item['title']; ?>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</body>
</html>
