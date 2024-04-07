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

// Create table for artists if it does not exist
$createArtistsTableSql = "CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    genre VARCHAR(50),
    decade VARCHAR(20),
    reg_date TIMESTAMP
)";

if ($conn->query($createArtistsTableSql) === TRUE) {
  // echo "Table artists created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "SELECT id, name, genre, decade FROM artists WHERE genre = 'Jazz' AND decade = '1960s'";
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music and Artist Search</title>
</head>
<body>
    <h1>Search Results for Jazz Artists from the 1960s</h1>
    
    <?php if ($result->num_rows > 0): ?>
        <ul>
            <?php while($row = $result->fetch_assoc()): ?>
                <li><?php echo $row["name"] ?>, Genre: <?php echo $row["genre"] ?>, Decade: <?php echo $row["decade"] ?></li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>
    
    <?php 
    // close the connection
    $conn->close(); 
    ?>
</body>
</html>
