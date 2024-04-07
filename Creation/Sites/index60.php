<?php
// PHP Backend and Frontend in one file for Full-Text Search in Blog Posts

// Database credentials
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

// Create blog_posts table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS blog_posts (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
content TEXT NOT NULL,
FULLTEXT (title, content)
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handling the search query
$search = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $search = mysqli_real_escape_string($conn, $_POST['search']);
  $sql = "SELECT *, MATCH (title, content) AGAINST ('" . $search . "') AS score FROM blog_posts WHERE MATCH (title, content) AGAINST ('" . $search . "' IN NATURAL LANGUAGE MODE) ORDER BY score DESC";
  $result = $conn->query($sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Full-Text Search in Blog Posts</title>
  <style>
    body { font-family: Arial, sans-serif; }
    .search-result { margin-bottom: 20px; }
    .highlight { background-color: yellow; }
  </style>
</head>
<body>

<h2>Blog Posts Search</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <input type="text" name="search" value="<?php echo $search; ?>">
  <input type="submit" value="Search">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $title = $row["title"];
      $content = $row["content"];
      // Highlight the search term in the result
      if (!empty($search)) {
        $title = preg_replace("/($search)/i", "<span class=\"highlight\">$1</span>", $title);
        $content = preg_replace("/($search)/i", "<span class=\"highlight\">$1</span>", $content);
      }
      echo "<div class='search-result'><h3>$title</h3><p>$content</p></div>";
    }
  } else {
    echo "No results found";
  }
}
$conn->close();
?>

</body>
</html>