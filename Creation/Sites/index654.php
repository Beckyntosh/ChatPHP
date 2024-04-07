<?php
// Database configuration
$hostname = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create videos table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS videos (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255),
description TEXT,
category VARCHAR(100),
url VARCHAR(255),
upload_date DATE
)";
if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check for search request
$search = isset($_GET['search']) ? $_GET['search'] : '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Heritage Haven - Clothing News</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #99a;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #077 3px solid;
        }
        header h1 {
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .search-box {
            text-align: center;
            margin: 20px 0;
        }
        .search-box input[type="text"] {
            width: 300px;
            padding: 10px;
        }
        .search-box input[type="submit"] {
            padding: 10px 20px;
        }
        .video-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .video {
            background: #fff;
            margin: 10px;
            box-shadow: 0 0 5px #aaa;
            padding: 20px;
            width: calc(33.333% - 20px);
            box-sizing: border-box;
        }
        .video h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Heritage Haven - Clothing News</h1>
        </div>
    </header>

    <div class="container search-box">
        <form action="" method="get">
            <input type="text" name="search" placeholder="Search videos...">
            <input type="submit" value="Search">
        </form>
    </div>

    <div class="container video-list">
        <?php
        if($search) {
            $sql = "SELECT * FROM videos WHERE title LIKE ? OR description LIKE ?";
            $stmt = $conn->prepare($sql);
            $searchTerm = '%'.$search.'%';
            $stmt->bind_param("ss", $searchTerm, $searchTerm);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="video">';
                    echo '<h3>'.htmlspecialchars($row['title']).'</h3>';
                    echo '<p>'.htmlspecialchars(substr($row['description'], 0, 100)).'...</p>';
                    echo '<a href="'.htmlspecialchars($row['url']).'" target="_blank">Watch Video</a>';
                    echo '</div>';
                }
            } else {
                echo '<p>No video found.</p>';
            }
        }
        ?>
    </div>
</body>
</html>