<?php
// Database configuration
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

// Create podcast table if not exist
$podcastTableSQL = "CREATE TABLE IF NOT EXISTS podcasts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    episode_count INT,
    category VARCHAR(100),
    publish_date DATE
);";
$conn->query($podcastTableSQL);

// Insert dummy podcasts data
$initPodcastsDataSQL = "INSERT INTO podcasts (title, description, episode_count, category, publish_date) VALUES
('Art Deco Design', 'Podcast discussing the influence of Art Deco in modern furniture design.', 10, 'Design', '2021-06-15'),
('Fashion Forward', 'Exploring the intersection of fashion and furniture through Art Deco styles.', 8, 'Fashion', '2021-07-20'),
('Lifestyle & Spaces', 'Creating lifestyle spaces using Art Deco inspired furniture.', 5, 'Lifestyle', '2021-08-25')
ON DUPLICATE KEY UPDATE title=VALUES(title)";
$conn->query($initPodcastsDataSQL);

// Search podcast functionality
$search = $_GET['search'] ?? ''; // Get search term from URL

$searchSQL = "SELECT * FROM podcasts WHERE title LIKE ? OR description LIKE ?";
$stmt = $conn->prepare($searchSQL);
$likeSearch = "%$search%";
$stmt->bind_param("ss", $likeSearch, $likeSearch);
$stmt->execute();
$result = $stmt->get_result();

// HTML and PHP mix for displaying results
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Deco Delight - Search Podcasts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #333;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #0779e4 3px solid;
        }
        header a {
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }
        .content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .podcast {
            background: #fff;
            border: 1px solid #ddd;
            margin: 10px;
            padding: 20px;
            width: calc(33% - 40px);
        }
        .podcast h3 {
            color: #0779e4;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Search for Podcasts - <span>Art Deco Delight</span></h1>
        </div>
    </header>
    <div class="container">
        <div class="content">
            <?php if ($result->num_rows > 0): ?>
                <?php while($podcast = $result->fetch_assoc()): ?>
                    <div class="podcast">
                        <h3><?= $podcast['title'] ?></h3>
                        <p><?= substr($podcast['description'], 0, 100) ?>...</p>
                        <ul>
                            <li>Episodes: <?= $podcast['episode_count'] ?></li>
                            <li>Category: <?= $podcast['category'] ?></li>
                            <li>Publish Date: <?= $podcast['publish_date'] ?></li>
                        </ul>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No podcasts found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
<?php
$conn->close();
?>