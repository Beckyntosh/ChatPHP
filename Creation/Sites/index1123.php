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

// Create table if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS artists (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  genre VARCHAR(30) NOT NULL,
  decade VARCHAR(4) NOT NULL,
  reg_date TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
  // echo "Table artists created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Search form
echo '<form method="get">
        <input type="text" name="search" placeholder="Search for artists..."/>
        <button type="submit">Search</button> 
      </form>';

// Handle search
if(isset($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    
    // Assuming the search term is formatted like 'Jazz artists from the 1960s'
    list($genre, $phrase, $from, $decade) = explode(' ', $search);
    $decade = rtrim($decade, 's');
    
    // Simple search query
    $sql = "SELECT name, genre, decade FROM artists WHERE genre='{$genre}' AND decade='{$decade}'";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<ul>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row["name"]. " - " . $row["genre"]. " " . $row["decade"]. "</li>";
        }
        echo "</ul>";
    } else {
        echo "0 results";
    }
}

$conn->close();
?>
