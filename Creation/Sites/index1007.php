<?php
// Define MySQL connection data
define("DB_SERVER", "db");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_DATABASE", "my_database");

// Create connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$createTableSql = "CREATE TABLE IF NOT EXISTS comments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  article_id INT NOT NULL,
  author VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  posted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTableSql)) {
    die("Error creating table: " . $conn->error);
}

// Handle POST request to add new comment
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["content"]) && isset($_POST["author"]) && isset($_POST["article_id"])) {
    $article_id = $conn->real_escape_string($_POST["article_id"]);
    $author = $conn->real_escape_string($_POST["author"]);
    $content = $conn->real_escape_string($_POST["content"]);

    $insertSql = "INSERT INTO comments (article_id, author, content) VALUES ('$article_id', '$author', '$content')";
    if (!$conn->query($insertSql)) {
        die("Error adding comment: " . $conn->error);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments Section</title>
    <style>
        .comment-box { margin-bottom: 20px; border: 1px solid #ddd; padding: 10px; }
        .comment-author { font-weight: bold; }
        .comment-content { margin-top: 5px; }
        .comment-form { margin-top: 20px; }
        .submit-btn { margin-top: 10px; }
    </style>
</head>
<body>
    <h2>Comments</h2>

    <?php
    // Fetch and display comments
    $articleId = 1; // Static article example, you might want to dynamic change this based on your setup
    $selectSql = "SELECT * FROM comments WHERE article_id = '$articleId' ORDER BY posted_at DESC";
    $result = $conn->query($selectSql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='comment-box'>";
            echo "<div class='comment-author'>" . htmlspecialchars($row["author"]) . "</div>";
            echo "<div class='comment-content'>" . htmlspecialchars($row["content"]) . "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>No comments yet. Be the first to comment!</p>";
    }
    ?>

    <div class="comment-form">
        <form action="" method="post">
Static article example
            <label for="author">Name:</label><br>
            <input type="text" id="author" name="author" required><br>
            <label for="content">Comment:</label><br>
            <textarea id="content" name="content" required></textarea><br>
            <input type="submit" value="Submit" class="submit-btn">
        </form>
    </div>

</body>
</html>
<?php $conn->close(); ?>
