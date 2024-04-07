<?php
$MYSQL_ROOT_PSWD = 'root';
$MYSQL_DB = 'my_database';

// Connect to the database
$conn = new mysqli('db', 'root', $MYSQL_ROOT_PSWD, $MYSQL_DB);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS blog_posts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    FULLTEXT (title, content)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['search'])) {
    $searchTerm = $conn->real_escape_string($_POST['search']);
    $query = "SELECT *, MATCH(title, content) AGAINST ('$searchTerm') AS score FROM blog_posts WHERE MATCH(title, content) AGAINST ('$searchTerm') ORDER BY score DESC";
    $result = $conn->query($query);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog Post Search</title>
    <style>
        .highlight {
            background-color: yellow;
        }
    </style>
</head>
<body>
    <form method="post" action="">
        <input type="text" name="search" placeholder="Search blog posts..." required>
        <input type="submit" value="Search">
    </form>

<?php
if (isset($result) && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $title = preg_replace('/('.preg_quote($searchTerm, '/').')/i', '<span class="highlight">$1</span>', $row['title']);
        $content = preg_replace('/('.preg_quote($searchTerm, '/').')/i', '<span class="highlight">$1</span>', $row['content']);
        echo "<div><h2>$title</h2><p>$content</p></div>";
    }
} elseif (isset($result)) {
    echo "<p>No results found.</p>";
}
?>

</body>
</html>

<?php $conn->close(); ?>