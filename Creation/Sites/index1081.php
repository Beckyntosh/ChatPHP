<?php
// Establish connection to the database
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

// Create comments table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS comments (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    article_id INT(11) NOT NULL,
    author VARCHAR(255) NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table comments created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Check for a post request to insert a new comment
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["comment"])) {
    $article_id = $_POST["article_id"];
    $author = $_POST["author"];
    $comment = $_POST["comment"];

    $stmt = $conn->prepare("INSERT INTO comments (article_id, author, comment) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $article_id, $author, $comment);
    
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Comments</title>
<style>
    body { font-family: Arial, sans-serif; }
    .comment-box { margin: 20px 0; }
    .comment-box textarea { width: 100%; }
    .comment { border: 1px solid #ccc; padding: 10px; margin-top: 10px; }
</style>
</head>
<body>

<div class="comment-section">
    <h2>Leave a Comment</h2>
    <form action="" method="post">
Example article ID
        <label for="author">Name:</label><br>
        <input type="text" id="author" name="author"><br>
        <label for="comment">Comment:</label><br>
        <textarea id="comment" name="comment" rows="4"></textarea><br>
        <input type="submit" value="Submit">
    </form>
</div>

<div class="comments">
    <h2>Comments</h2>
    <?php
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT author, comment, created_at FROM comments WHERE article_id=1 ORDER BY created_at DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='comment'>";
            echo "<p><strong>" . htmlspecialchars($row["author"]) . "</strong> <span>" . htmlspecialchars($row["created_at"]) . "</span></p>";
            echo "<p>" . htmlspecialchars($row["comment"]) . "</p>";
            echo "</div>";
        }
    } else {
        echo "No comments yet. Be the first to comment!";
    }
    $conn->close();
    ?>
</div>

</body>
</html>
