<?php
// Connection to the database
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

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS artists (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  genre VARCHAR(50) NOT NULL,
  decade VARCHAR(20) NOT NULL,
  reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table artists created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS songs (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  artist_id INT(6) UNSIGNED,
  title VARCHAR(100) NOT NULL,
  release_year YEAR NOT NULL,
  FOREIGN KEY (artist_id) REFERENCES artists(id),
  reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table songs created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Searching mechanism
$search = "";
if(isset($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
}

$query = "
  SELECT artists.name AS artist_name, genre, title, release_year FROM songs
  JOIN artists ON songs.artist_id = artists.id
  WHERE genre LIKE '%Jazz%' AND decade='1960s' AND (artists.name LIKE '%$search%' OR title LIKE '%$search%')
";

$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Music and Artist Search</title>
</head>
<body>
  <h1>Search Jazz Artists from the 1960s</h1>
  <form action="" method="get">
    <input type="text" name="search" placeholder="Search by artist or song title" value="<?php echo htmlspecialchars($search); ?>">
    <button type="submit">Search</button>
  </form>

<?php
if ($result->num_rows > 0) {
  echo "<ul>";
  while($row = $result->fetch_assoc()) {
    echo "<li>".$row["artist_name"]." - ".$row["title"]. " (".$row["release_year"].")</li>";
  }
  echo "</ul>";
} else {
  echo "0 results found";
}
?>

</body>
</html>

<?php
$conn->close();
?>
