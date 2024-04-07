<?php
// Database connection parameters
$host = 'db';
$username = 'root';
$password = 'root';
$database = 'my_database';

// Establish database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create videos table if it doesn't exist
$createVideosTable = "
CREATE TABLE IF NOT EXISTS videos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    category VARCHAR(100),
    url VARCHAR(255)
);
";
$conn->query($createVideosTable);

// Handle video search
$search = $_GET['search'] ?? '';

// Query to fetch videos based on search
$searchQuery = "SELECT * FROM videos WHERE title LIKE ? OR description LIKE ?";
$stmt = $conn->prepare($searchQuery);
$searchTerm = '%' . $search . '%';
$stmt->bind_param("ss", $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Craft Beers Language Learning</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4c3; /* Light Green Background */
            color: #3e4e50; /* Dark Gray Text */
        }
        header {
            background-color: #8bc34a; /* Eco-friendly Green */
            color: white;
            padding: 10px 0;
            text-align: center;
            font-size: 24px;
        }
        .videos {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }
        .video {
            background-color: #a5d6a7; /* Light Green */
            border-radius: 8px;
            padding: 10px;
            margin: 10px;
            width: 300px;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        Craft Beers Language Learning - Search Videos
    </header>

    <form method="GET" action="">
        <input type="text" name="search" placeholder="Search videos..." value="<?= htmlspecialchars($search) ?>"/>
        <button type="submit">Search</button>
    </form>

    <div class="videos">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="video">
                <h3><?= htmlspecialchars($row['title']) ?></h3>
                <p><?= htmlspecialchars($row['description']) ?></p>
                <a href="<?= htmlspecialchars($row['url']) ?>" target="_blank">Watch Video</a>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>