<?php
// Connect to database
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

// Create tables if not exist
$artistTableSql = "CREATE TABLE IF NOT EXISTS artists (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  genre VARCHAR(50) NOT NULL,
  decade CHAR(4),
  reg_date TIMESTAMP
)";

$musicTableSql = "CREATE TABLE IF NOT EXISTS music (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  artist_id INT(6) UNSIGNED,
  title VARCHAR(50) NOT NULL,
  release_year YEAR(4),
  FOREIGN KEY (artist_id) REFERENCES artists(id) ON DELETE CASCADE
)";

if (!$conn->query($artistTableSql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

if (!$conn->query($musicTableSql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $search = $_POST['search'];
  $query = "SELECT artists.name, music.title, music.release_year FROM music 
            INNER JOIN artists ON music.artist_id = artists.id 
            WHERE artists.genre='Jazz' AND artists.decade='1960s' AND (artists.name LIKE '%".$search."%' OR music.title LIKE '%".$search."%')";
  $result = $conn->query($query);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Music and Artist Search</title>
</head>
<body>

<h1>Search for Jazz Artists from the 1960s</h1>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <input type="text" name="search" placeholder="Search artists or music titles...">
  <input type="submit" value="Search">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
      echo "Artist: " . $row["name"]. " - Music Title: " . $row["title"]. " (" . $row["release_year"] . ")<br>";
    }
  } else {
    echo "0 results found";
  }
}
$conn->close();
?>

</body>
</html>
