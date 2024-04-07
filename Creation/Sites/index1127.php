<?php
// Check for Search Request
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

// Database Configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS artists (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  genre VARCHAR(30) NOT NULL,
  decade CHAR(4),
  reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Escaping user input for security
$searchQuery = $conn->real_escape_string($searchQuery);

$sqlSearch = "SELECT * FROM artists WHERE genre = 'Jazz' AND decade='1960s' AND name LIKE '%$searchQuery%' ORDER BY name ASC";

$result = $conn->query($sqlSearch);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Music and Artist Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        .search-box { margin-bottom: 20px; }
        .artist { margin-bottom: 10px; padding: 10px; background-color: #f2f2f2; border-radius: 5px; }
        .artist h3 { margin: 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="search-box">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                <input type="text" name="search" placeholder="Enter artist name..." value="<?php echo htmlspecialchars($searchQuery); ?>">
                <button type="submit">Search</button>
            </form>
        </div>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="artist">';
                echo '<h3>'.htmlspecialchars($row["name"]).'</h3>';
                echo '<p>Genre: '.htmlspecialchars($row["genre"]).'</p>';
                echo '<p>Decade: '.htmlspecialchars($row["decade"]).'</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No results found.</p>';
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
