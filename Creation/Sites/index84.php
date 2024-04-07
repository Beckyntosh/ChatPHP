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

// Create table for images if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS gallery_images (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    image_url VARCHAR(100) NOT NULL,
    tags VARCHAR(50),
    date DATE,
    artist VARCHAR(50)
    )";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle image search
$search = $_GET['search'] ?? '';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Skateboards Digital Gallery</title>
    <style>
        body { font-family: 'Courier New', Courier, monospace; font-size: 16px; }
        .gallery { display: flex; flex-wrap: wrap; padding: 5px; }
        .item { margin: 10px; text-align: center; }
        img { max-width: 200px; max-height: 200px; }
        .search-box { margin-bottom: 20px; }
    </style>
</head>
<body>
    <h1>Alan Turing Style Skateboards Digital Gallery</h1>
    <div class="search-box">
        <form action="" method="get">
            <input type="text" name="search" placeholder="Search by tags, date, artist..." value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit">Search</button>
        </form>
    </div>
    <div class="gallery">
        <?php
        // Search query
        $sql = "SELECT * FROM gallery_images WHERE tags LIKE '%$search%' OR artist LIKE '%$search%' ORDER BY date DESC";
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // Output data of each row
          while($row = $result->fetch_assoc()) {
            echo '<div class="item">';
            echo '<img src="'.$row["image_url"].'" alt="'.$row["title"].'">';
            echo '<h3>' . $row["title"] . '</h3>';
            echo '<p>Tags: ' . $row["tags"] . '</p>';
            echo '<p>Artist: ' . $row["artist"] . '</p>';
            echo '<p>Date: ' . $row["date"] . '</p>';
            echo '</div>';
          }
        } else {
          echo "0 results found";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>