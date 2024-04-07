<?php
// Connection parameters
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$createTableSQL = "CREATE TABLE IF NOT EXISTS comments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_id INT(6) UNSIGNED,
    author VARCHAR(50) NOT NULL,
    comment TEXT NOT NULL,
    posted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($createTableSQL)) {
    echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment'])) {
    $post_id = $conn->real_escape_string($_POST['post_id']);
    $author = $conn->real_escape_string($_POST['author']);
    $comment = $conn->real_escape_string($_POST['comment']);

    $insertSQL = "INSERT INTO comments (post_id, author, comment) VALUES ('$post_id', '$author', '$comment')";

    if (!$conn->query($insertSQL)) {
        echo "Error: " . $conn->error;
    }
}

// HTML and Form
?>
<!DOCTYPE html>
<html>
<head>
    <title>Comments Section</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .comment-container { margin-top: 20px; }
        .comment { border-bottom: 1px solid #eee; padding: 10px; }
        .comment-author { font-weight: bold; }
        .comment-text { margin-top: 5px; }
    </style>
</head>
<body>

<h2>Comments</h2>

<form action="" method="POST">
Static post_id for example
    <input type="text" name="author" placeholder="Your Name" required><br><br>
    <textarea name="comment" placeholder="Your Comment" required></textarea><br><br>
    <button type="submit">Submit Comment</button>
</form>

<div class="comment-container">
<?php
// Fetch comments from database
$commentsSQL = "SELECT author, comment, posted_at FROM comments WHERE post_id = 1 ORDER BY posted_at DESC";
$result = $conn->query($commentsSQL);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="comment">';
        echo '<div class="comment-author">' . htmlspecialchars($row['author']) . '</div>';
        echo '<div class="comment-text">' . htmlspecialchars($row['comment']) . '</div>';
        echo '<div class="comment-date">' . $row['posted_at'] . '</div>';
        echo '</div>';
    }
} else {
    echo "No comments yet.";
}
?>
</div>

</body>
</html>
<?php

// Close connection
$conn->close();

?>
