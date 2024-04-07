<?php
// Database connection
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

// Search functionality
$search = $_GET['search'] ?? '';
$blogs = [];

if($search) {
    $sql = "SELECT id, title, content, MATCH(title,content) AGAINST (?) AS score FROM blog_posts WHERE MATCH(title,content) AGAINST (?) ORDER BY score DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $search, $search);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()) {
        $row['highlighted_title'] = preg_replace("/($search)/i", "<b>$1</b>", $row['title']);
        $row['highlighted_content'] = preg_replace("/($search)/i", "<b>$1</b>", $row['content']);
        $blogs[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blog Search</title>
<style>
body { font-family: Arial, sans-serif; }
.search-box { margin-bottom: 20px; }
.blog-post { margin-bottom: 40px; padding-bottom: 20px; border-bottom: 1px solid #ddd; }
</style>
</head>
<body>
<div class="search-box">
    <form action="" method="GET">
        <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Search for blog posts...">
        <button type="submit">Search</button>
    </form>
</div>

<?php if($search): ?>
    <h2>Search Results for "<?= htmlspecialchars($search) ?>"</h2>
    <?php if(count($blogs) > 0): ?>
        <?php foreach($blogs as $blog): ?>
            <div class="blog-post">
                <h3><?= $blog['highlighted_title'] ?></h3>
                <p><?= $blog['highlighted_content'] ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No blog posts found.</p>
    <?php endif; ?>
<?php endif; ?>
</body>
</html>