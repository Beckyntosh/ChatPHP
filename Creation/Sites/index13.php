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

// Creating table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    decade VARCHAR(30) 
)";

if ($conn->query($tableSql) === TRUE) {
    // echo "Table artists created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Search form
echo '<form method="POST" action="">
    <input type="text" name="searchQuery" placeholder="Search for artists...">
    <input type="submit" name="submit" value="Search">
</form>';

if(isset($_POST['submit'])) {
    $searchQuery = $conn->real_escape_string($_POST['searchQuery']);
    
    // Assuming the query might mention the decade and genre specifically
    $searchArray = explode(' ', $searchQuery);
    $genre = '';
    $decade = '';
    
    // Basic search functionality
    foreach($searchArray as $word) {
        if (strtolower($word) === 'jazz') {
            $genre = 'Jazz';
        }
        if (strpos($word, '1960s') !== false) {
            $decade = '1960s';
        }
    }

    // Searching in database
    $sql = "SELECT name, genre, decade FROM artists 
            WHERE genre LIKE '%$genre%' AND decade LIKE '%$decade%'";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        echo '<ul>';
        while($row = $result->fetch_assoc()) {
            echo '<li>' . $row["name"]. " - " . $row["genre"]. " - " . $row["decade"]. '</li>';
        }
        echo '</ul>';
    } else {
        echo "0 results";
    }
}

$conn->close();
?>
