<?php
// Config Section
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

// Create posts table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS posts (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  tags VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($tableSql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Fetch posts based on query
function fetchPosts($conn, $query) {
  $sql = "SELECT id, title, content, tags FROM posts WHERE title LIKE ? OR content LIKE ? OR tags LIKE ?";
  $stmt = $conn->prepare($sql);
  $likeQuery = '%' . $query . '%';
  $stmt->bind_param("sss", $likeQuery, $likeQuery, $likeQuery);
  $stmt->execute();
  $result = $stmt->get_result();
  $posts = [];
  while($row = $result->fetch_assoc()) {
    $posts[] = $row;
  }
  return $posts;
}

$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
$posts = fetchPosts($conn, $searchQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Real-Time Forum Search</title>
  <style>
    body { font-family: Arial, sans-serif; }
    .post { margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; }
    input[type="text"] { width: 100%; padding: 10px; margin-bottom: 20px; }
  </style>
  <script>
    function searchPosts() {
      var input = document.getElementById('searchInput').value;
      window.location.search = '?search=' + encodeURIComponent(input);
    }
  </script>
</head>
<body>
  
  <h1>Search Posts</h1>
  <input type="text" id="searchInput" onkeyup="searchPosts()" placeholder="Search for posts...">
  
  <?php foreach ($posts as $post): ?>
    <div class="post">
      <h2><?php echo htmlspecialchars($post['title']); ?></h2>
      <p><?php echo htmlspecialchars($post['content']); ?></p>
      <small>Tags: <?php echo htmlspecialchars($post['tags']); ?></small>
    </div>
  <?php endforeach; ?>

</body>
</html>

<?php $conn->close(); ?>