<?php
// Connection parameters
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
$sql = "CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    decade CHAR(10),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS music (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_id INT(6) UNSIGNED,
    title VARCHAR(50) NOT NULL,
    release_year YEAR(4),
    FOREIGN KEY (artist_id) REFERENCES artists(id),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if search query is set
$search = isset($_GET['search']) ? $_GET['search'] : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Music and Artist Search</title>
</head>
<body>

<h2>Search for Music and Artists</h2>

<form method="GET">
  <input type="text" name="search" placeholder="Jazz artists from the 1960s" value="<?php echo $search;?>">
  <button type="submit">Search</button>
</form>

<?php
if($search){
  // Search query
  $sql = "SELECT artists.name, music.title, music.release_year from artists
  JOIN music ON artists.id = music.artist_id
  WHERE artists.genre LIKE '%Jazz%' AND artists.decade = '1960s'
  AND (artists.name LIKE '%$search%' OR music.title LIKE '%$search%')";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<ul>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<li>".$row["name"]." - ".$row["title"]." (".$row["release_year"].")</li>";
    }
    echo "</ul>";
  } else {
    echo "0 results";
  }
}
$conn->close();
?>

</body>
</html>
