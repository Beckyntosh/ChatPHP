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

// Create the Artists table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS Artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    genre VARCHAR(30) NOT NULL,
    decade VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Search form
echo '<!DOCTYPE html>
      <html>
      <head>
          <title>Music and Artist Search</title>
          <style>
              body { font-family: Arial, sans-serif; }
              .search-form { margin: 20px; }
              .results { margin-left: 20px; }
          </style>
      </head>
      <body>
          <div class="search-form">
              <h1>Search for Jazz Artists from the 1960s</h1>
              <form action="" method="post">
                  <input type="text" name="search" placeholder="Enter artist name or leave blank to list all...">
                  <input type="submit" name="submit" value="Search">
              </form>
          </div>';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $conn->real_escape_string($_POST['search']);
    
    $sql = "SELECT id, name, genre, decade FROM Artists WHERE genre='Jazz' AND decade='1960s'" .
           ($search ? " AND name LIKE '%$search%'" : "");
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display results
        echo "<div class='results'><h2>Results:</h2><ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>" . htmlspecialchars($row["name"]) . " - Genre: " . htmlspecialchars($row["genre"]) . ", Decade: " . htmlspecialchars($row["decade"]) . "</li>";
        }
        echo "</ul></div>";
    } else {
        echo "<div class='results'>No results found</div>";
    }
}
echo '</body></html>';
$conn->close();
?>
