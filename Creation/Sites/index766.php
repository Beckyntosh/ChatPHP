<?php

// Establish database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create tables if they don't exist
    $sql = "CREATE TABLE IF NOT EXISTS blog_posts (
                id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255),
                content TEXT,
                author_id INT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );
            
            CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(30),
                name VARCHAR(30),
                email VARCHAR(50),
                password VARCHAR(255)
            );";

    $conn->exec($sql);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Insert new blog post into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = $_POST['author_id']; // Example: In your real application, use authenticated user's ID

    $sql = "INSERT INTO blog_posts (title, content, author_id) VALUES (?, ?, ?)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$title, $content, $author_id]);
        echo "New post created successfully";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type=text], textarea {
            width: 100%;
            padding: 8px;
            margin-top: 10px;
            margin-bottom: 20px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Create a New Blog Post</h2>
    <form method="post" action="">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" required>
        
        <label for="content">Content</label>
        <textarea id="content" name="content" required></textarea>
        
        <label for="author_id">Author ID</label>
        <input type="text" id="author_id" name="author_id" required>
        
        <input type="submit" value="Create Post">
    </form>
</div>

</body>
</html>