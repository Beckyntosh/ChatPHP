<?php
// Database configurations
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

// Create artists table if it doesn't exist
$createArtistsTable = "CREATE TABLE IF NOT EXISTS artists (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
bio TEXT,
style VARCHAR(255)
);";

if (!$conn->query($createArtistsTable)) {
    die("Error creating table: " . $conn->error);
}

// Handle search request
$search = isset($_GET['search']) ? $_GET['search'] : '';

// HTML and CSS for Art Deco Delight theme
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Artists Search - Office Supplies Technology and Gadget Review Site</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0e6d6;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }
        .search-box {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .search-box input[type="text"] {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 70%;
            margin-right: 10px;
        }
        .search-box input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .artist-item {
            background-color: #fff;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .artist-item h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="search-box">
            <form method="get">
                <input type="text" name="search" placeholder="Search for artists..." value="<?= htmlspecialchars($search) ?>">
                <input type="submit" value="Search">
            </form>
        </div>
        <?php
        if ($search) {
            $sql = "SELECT * FROM artists WHERE name LIKE ? OR style LIKE ?";
            $stmt = $conn->prepare($sql);
            $likeSearch = '%' . $search . '%';
            $stmt->bind_param('ss', $likeSearch, $likeSearch);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='artist-item'>";
                    echo "<h3>".htmlspecialchars($row['name'])."</h3>";
                    echo "<p>". nl2br(htmlspecialchars($row['bio'])) ."</p>";
                    echo "<p><strong>Style: </strong>".htmlspecialchars($row['style'])."</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No artists found</p>";
            }
        }
        ?>
    </div>
</body>
</html>
<?php
$conn->close();
?>