<?php
// Database connection settings
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'my_database');

// Connect to database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create comments table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS comments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_id INT(6) UNSIGNED NOT NULL,
    author VARCHAR(30) NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Handle new comment submission
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comment']) && isset($_POST['post_id'])) {
    $post_id = $conn->real_escape_string($_POST['post_id']);
    $author = $conn->real_escape_string($_POST['author']);
    $comment = $conn->real_escape_string($_POST['comment']);
    
    $sql = "INSERT INTO comments (post_id, author, comment) VALUES ('$post_id', '$author', '$comment')";
    
    if(!$conn->query($sql)) {
        die("Error: " . $sql . "<br>" . $conn->error);
    }

    // Redirect to avoid form resubmission
    header("Location: " . $_SERVER['PHP_SELF'] . "?post_id=" . $post_id);
    exit();
}

// Fetch comments based on post_id
$post_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : 0;
$sql = "SELECT author, comment, created_at FROM comments WHERE post_id = '$post_id' ORDER BY created_at DESC";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comments Section</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f5f5f5; }
        .comment-container { margin: 20px auto; width: 80%; max-width: 600px; }
        .comment-form { margin-bottom: 40px; }
        .comment { background-color: #fff; padding: 20px; margin-bottom: 20px; border-radius: 5px; }
        .comment .author { font-weight: bold; }
        .comment .date { color: #777; font-size: 0.8em; }
        .comment .text { margin-top: 10px; }
    </style>
</head>
<body>

<div class="comment-container">
    <h2>Leave a Comment</h2>
    <form class="comment-form" action="" method="POST">
        <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
        <p><label for="author">Name:</label><br>
        <input type="text" name="author" id="author" required></p>
        <p><label for="comment">Comment:</label><br>
        <textarea name="comment" id="comment" rows="5" required></textarea></p>
        <p><button type="submit">Submit Comment</button></p>
    </form>

    <h2>Comments</h2>
    <?php if($result && $result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="comment">
                <div class="author"><?php echo htmlspecialchars($row["author"]); ?></div>
                <div class="date"><?php echo htmlspecialchars($row["created_at"]); ?></div>
                <div class="text"><?php echo nl2br(htmlspecialchars($row["comment"])); ?></div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No comments yet.</p>
    <?php endif; ?>
</div>

</body>
</html>
<?php $conn->close(); ?>
