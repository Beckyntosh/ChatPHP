
<?php
// Simple Music and Artist Search Example

// Database Connection (Replace placeholders with your actual database credentials)
$servername = "db";
$username = "root";
$password = "root"; // WARNING: Using root user and passwords in code is insecure. Use environment variables and secure methods for production.
$dbname = "my_database";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exists (For simplicity, error checking is minimal. Consider using migrations in production)
$conn->query("CREATE TABLE IF NOT EXISTS genres (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
)");

$conn->query("CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    genre_id INT(6) UNSIGNED,
    year_active_start INT(4),
    FOREIGN KEY (genre_id) REFERENCES genres(id)
)");

$searchTerm = isset($_GET['searchTerm']) ? $conn->real_escape_string($_GET['searchTerm']) : '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Music and Artist Search</title>
</head>
<body>
<h1>Search for Music Artists and Genres</h1>
<form action="" method="get">
    <label for="searchTerm">Search:</label>
    <input type="text" id="searchTerm" name="searchTerm" placeholder="e.g., Jazz artists from the 1960s">
    <input type="submit" value="Search">
</form>

<?php
if (!empty($searchTerm)) {
    // Assume searchTerm is like "Jazz artists from the 1960s", this is simplistic and for exact matches only.
    preg_match('/(.*) artists from the (\d{4})s/', $searchTerm, $matches);
    $genre = $matches[1] ?? '';
    $decadeStart = $matches[2] ?? '';

    $sql = "SELECT artists.name, genres.name AS genre_name, year_active_start FROM artists
            JOIN genres ON artists.genre_id = genres.id
            WHERE genres.name = '".$genre."' AND year_active_start BETWEEN $decadeStart AND ".($decadeStart + 9);

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>".$row['name']." - Genre: ".$row['genre_name']." - Started in: ".$row['year_active_start']."</li>";
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

Note: For production use, it's essential to:
1. Use parameterized queries to prevent SQL injection.
2. Not to use the MySQL root user for web applications. Create a dedicated user with restricted privileges.
3. Securely handle your database credentials, possibly using environment variables or secure configuration management tools.
4. Implement proper error handling and sanitization of user inputs.
5. Consider separating your PHP logic and HTML for better maintainability and security.