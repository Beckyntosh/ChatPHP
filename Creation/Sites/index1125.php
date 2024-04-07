<?php
// Establish connection to the database
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

// Create table if not exists
$table_sql = "CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    genre VARCHAR(50) NOT NULL,
    decade VARCHAR(50)
)";

if ($conn->query($table_sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

$search = isset($_GET['search']) ? $_GET['search'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music and Artist Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table, th, td { border: 1px solid #ddd; border-collapse: collapse; }
        th, td { padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Search for Artists and Music</h2>
    <form method="GET">
        <input type="text" name="search" placeholder="e.g., Jazz artists from the 1960s" value="<?php echo htmlentities($search); ?>" />
        <button type="submit">Search</button>
    </form>
    <?php
    if (!empty($search)) {
        // Split search term to use in SQL LIKE statement
        $terms = explode(' ', $search);
        $searchTerms = [];
        foreach ($terms as $term) {
            $searchTerms[] = "name LIKE '%".$conn->real_escape_string($term)."%' OR genre LIKE '%".$conn->real_escape_string($term)."%' OR decade LIKE '%".$conn->real_escape_string($term)."%'";
        }
        $searchSql = implode(' AND ', $searchTerms);
        
        // Query based on search
        $sql = "SELECT id, name, genre, decade FROM artists WHERE $searchSql";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Name</th><th>Genre</th><th>Decade</th></tr>";
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["genre"]."</td><td>".$row["decade"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results found";
        }
    }
    $conn->close();
    ?>
</body>
</html>
