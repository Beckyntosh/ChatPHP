<?php
// Connection to MySQL
$servername = "db";
$dbname = "my_database";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS Artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    decade VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
if ($conn->query($sql) === TRUE) {
    echo "Table Artists created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS Songs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_id INT(6) UNSIGNED,
    title VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (artist_id) REFERENCES Artists(id)
    )";
if ($conn->query($sql) === TRUE) {
    echo "Table Songs created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// HTML and PHP to handle search
?>
<!DOCTYPE html>
<html>
<head>
    <title>Music and Artist Search</title>
</head>
<body>
<h1>Search for Jazz Artists from the 1960s</h1>
<form method="post">
    <input type="text" name="search" placeholder="Enter search keywords">
    <input type="submit" name="submit" value="Search">
</form>
<?php
if(isset($_POST['submit'])){
    $search = $conn->real_escape_string($_POST['search']);
    // Example search query
    $sql = "SELECT Artists.name, Songs.title FROM Artists INNER JOIN Songs ON Artists.id = Songs.artist_id WHERE Artists.genre = 'Jazz' AND Artists.decade = '1960s' AND (Artists.name LIKE '%$search%' OR Songs.title LIKE '%$search%')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>Artist: " . $row["name"]. " - Title: " . $row["title"]. "</li>";
        }
        echo "</ul>";
    } else {
        echo "0 results found";
    }
}
$conn->close();
?>
</body>
</html>
