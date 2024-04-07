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

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS artists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    genre VARCHAR(100),
    era VARCHAR(50)
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    artist_id INT,
    title VARCHAR(255) NOT NULL,
    year INT,
    FOREIGN KEY(artist_id) REFERENCES artists(id)
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

$search = $_POST['search'] ?? '';

?>
<!DOCTYPE html>
<html>
<head>
<title>Music and Artist Search</title>
</head>
<body style="background-color: lemonchiffon; font-family: Arial, sans-serif;">
<h2>Search for Jazz Artists from the 1960s</h2>
<form action="" method="post">
  <input type="text" name="search" value="<?php echo $search; ?>" placeholder="Enter search term...">
  <button type="submit">Search</button>
</form>

<?php
if ($search) {
    $sql = "SELECT a.name, r.title, r.year 
            FROM artists a 
            JOIN records r ON a.id = r.artist_id 
            WHERE a.genre LIKE '%jazz%' AND a.era = '1960s' AND (a.name LIKE ? OR r.title LIKE ?)";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%$search%";
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>" . htmlspecialchars($row['name']) . " - " . htmlspecialchars($row['title']) . " (" . htmlspecialchars($row['year']) . ")</li>";
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
