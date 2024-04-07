<?php
// Connection to the database
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

// Create comments table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS comments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    article_id INT(6) UNSIGNED,
    author_name VARCHAR(30) NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    content TEXT NOT NULL,
    FOREIGN KEY (article_id) REFERENCES articles(id)
)";
if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Insert comment
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $article_id = $_POST['article_id'];
    $author_name = $_POST['author_name'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("INSERT INTO comments (article_id, author_name, content) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $article_id, $author_name, $content);
    $stmt->execute();
    $stmt->close();
}

// Display comments
echo "<div id='comments'>";
$sql = "SELECT author_name, date, content FROM comments WHERE article_id = 1"; // Change 1 to dynamic article ID based on the real application
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='comment'>";
        echo "<p><strong>" . htmlspecialchars($row['author_name']) . "</strong> " . $row['date'] . "</p>";
        echo "<p>" . htmlspecialchars($row['content']) . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>No comments yet. Be the first to comment!</p>";
}
echo "</div>";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Comments Section</title>
    <style>
        #comments { margin-top: 20px; }
        .comment { border-bottom: 1px solid #ccc; padding: 10px; }
    </style>
</head>
<body>
    <h2>Comment on this article</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
Change 1 to dynamic article ID based on the real application
        <label for="author_name">Name:</label><br>
        <input type="text" id="author_name" name="author_name" required><br>
        <label for="content">Comment:</label><br>
        <textarea id="content" name="content" rows="4" required></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php $conn->close(); ?>
