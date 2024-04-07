<?php
// Database Configuration
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

// Create additional table if not exists for blog posts
$sql = "CREATE TABLE IF NOT EXISTS blog_posts (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255),
content TEXT,
author VARCHAR(50),
posted_date DATETIME DEFAULT CURRENT_TIMESTAMP
);";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Function for searching blog posts
function searchBlogPosts($conn, $keyword) {
    $sql = "SELECT * FROM blog_posts WHERE title LIKE '%$keyword%' OR content LIKE '%$keyword%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='blog-posts'>";
        while($row = $result->fetch_assoc()) {
            echo "<div class='blog-post'>";
            echo "<h3>" . htmlspecialchars($row["title"]) . "</h3>";
            echo "<p>" . nl2br(htmlspecialchars($row["content"])) . "</p>";
            echo "<p>Posted by: " . htmlspecialchars($row["author"]) . " on " . $row["posted_date"] . "</p>";
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<p>No blog posts found.</p>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vitamins Social Networking Site</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ADD8E6;
            color: #333;
        }
        .blog-post {
            background-color: #fff;
            margin: 20px;
            padding: 20px;
            border-radius: 5px;
        }
        .search-box {
            text-align: center;
            padding: 20px;
        }
        .search-box input[type="text"] {
            width: 300px;
            height: 40px;
            padding: 5px;
        }
        .search-box input[type="submit"] {
            height: 50px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="search-box">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <input type="text" name="keyword" placeholder="Search blog posts...">
            <input type="submit" value="Search">
        </form>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $keyword = $_POST["keyword"];
        if(!empty($keyword)){
            searchBlogPosts($conn, $keyword);
        } else {
            echo "<p>Please enter a search keyword.</p>";
        }
    }
    ?>
</body>
</html>
<?php
$conn->close();
?>