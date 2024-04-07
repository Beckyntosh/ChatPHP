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

// Create tables if not exist
$sqlTables = [
    "CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        description TEXT,
        category VARCHAR(100),
        price DECIMAL(10, 2),
        stock_quantity INT
    );",
    "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30),
        name VARCHAR(30),
        email VARCHAR(50),
        password VARCHAR(255)
    );",
    "CREATE TABLE IF NOT EXISTS blog_posts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255),
        content TEXT,
        author_id INT,
        post_date DATETIME,
        FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE CASCADE
    );"
];

foreach ($sqlTables as $sql) {
    if ($conn->query($sql) !== TRUE) {
        echo "Error creating table: " . $conn->error;
    }
}

// Search Functionality
$searchKeyword = isset($_GET['search']) ? $_GET['search'] : '';

$sqlSearch = "SELECT * FROM blog_posts WHERE title LIKE '%" . $searchKeyword . "%' OR content LIKE '%" . $searchKeyword . "%'";
$result = $conn->query($sqlSearch);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Heritage Haven - Shoe Discussion Platform</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f3ee;
            color: #3e4c59;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #8a7f70;
            color: #ffffff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #076485 3px solid;
        }
        header h1 {
            text-align: center;
            margin: 0;
        }
        .search-container {
            margin-top: 20px;
            text-align: center;
        }
        .search-container input[type="text"] {
            width: 40%;
            padding: 10px;
        }
        .search-container input[type="submit"] {
            padding: 10px 20px;
            background: #5a6268;
            color: #ffffff;
            border: none;
        }
        .blog-posts {
            padding: 20px;
            background: #ffffff;
            margin-top: 20px;
        }
        .post {
            border-bottom: 1px solid #e1e1e1;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .post:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Heritage Haven</h1>
    </header>
    <div class="container">
        <div class="search-container">
            <form action="" method="get">
                <input type="text" name="search" placeholder="Search blog posts...">
                <input type="submit" value="Search">
            </form>
        </div>
        <div class="blog-posts">
            <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='post'>";
                        echo "<h2>" . $row["title"] . "</h2>";
                        echo "<p>" . $row["content"] . "</p>";
                        echo "<small>Posted on: " . $row["post_date"] . "</small>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No blog posts found.</p>";
                }
            ?>
        </div>
    </div>
</body>
</html>
<?php
$conn->close();
?>