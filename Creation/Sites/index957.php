<?php
// Define database connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if comment form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["content"])) {
        $content = $_POST["content"];
        $postId = $_POST["postId"];
        // Insert comment into database
        $stmt = $conn->prepare("INSERT INTO comments (postId, content) VALUES (:postId, :content)");
        $stmt->bindParam(':postId', $postId);
        $stmt->bindParam(':content', $content);
        $stmt->execute();
    }

    // Create comments table if it doesn't exist
    $conn->exec("CREATE TABLE IF NOT EXISTS comments (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        postId INT(6) UNSIGNED,
        content TEXT,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )");
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Blog Post Comment Section</title>
    <style>
        .comment-box { margin-bottom: 20px; border-bottom: 1px solid #ccc; padding: 10px; }
        .comment-content { margin-top: 5px; }
    </style>
</head>
<body>
    <div class="comment-section">
        <h2>Leave a Comment</h2>
        <form action="" method="post">
Example Post ID
            <textarea name="content" placeholder="Write your comment here..." required></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>
    <div class="comments">
        <h2>Comments</h2>
        <?php
        // Fetch all comments from database
        $stmt = $conn->prepare("SELECT content, reg_date FROM comments WHERE postId = 1 ORDER BY reg_date DESC");
        $stmt->execute();
        
        $result = $stmt->fetchAll();

        if ($result) {
            foreach ($result as $row) {
                echo '<div class="comment-box">';
                echo '<p class="comment-content">' . htmlspecialchars($row["content"]) . '</p>';
                echo '<p class="comment-date">' . $row["reg_date"] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No comments yet.</p>';
        }
        ?>
    </div>
</body>
</html>
