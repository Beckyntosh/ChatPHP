<?php
// Connect to MySQL Database
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

$conn = new mysqli($servername, $username, $password, $database);

// Check Connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create Comments Table if not exists
$createTable = "CREATE TABLE IF NOT EXISTS comments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    article_id INT(6) UNSIGNED NOT NULL,
    author VARCHAR(50) NOT NULL,
    comment TEXT NOT NULL,
    comment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($createTable) === TRUE) {
  echo ""; // Successfully created table
} else {
  echo "Error: " . $conn->error;
}

// Handle new comment POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $article_id = $_POST['article_id'];
  $author = $_POST['author'];
  $comment = $_POST['comment'];

  $stmt = $conn->prepare("INSERT INTO comments (article_id, author, comment) VALUES (?, ?, ?)");
  $stmt->bind_param("iss", $article_id, $author, $comment);

  if ($stmt->execute()) {
    echo "<script>alert('Comment added successfully!');</script>";
  } else {
    echo "<script>alert('Error adding comment');</script>";
  }
  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>News Article Comments</title>
<style>
  .comments-container {
    margin-top: 20px;
  }
  .comment {
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #ccc;
  }
</style>
</head>
<body>
<div class="comments-section">
  <h2>Comments</h2>
  <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
Example article_id
    <label for="author">Name:</label><br>
    <input type="text" id="author" name="author" required><br>
    <label for="comment">Comment:</label><br>
    <textarea id="comment" name="comment" rows="4" required></textarea><br><br>
    <input type="submit" value="Submit">
  </form>
  
  <div class="comments-container">
    <?php
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT author, comment, comment_date FROM comments WHERE article_id=1 ORDER BY comment_date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<div class='comment'><strong>" . htmlspecialchars($row["author"]) . "</strong> says:<br>" . htmlspecialchars($row["comment"]) . "<br><small>" . $row["comment_date"] . "</small></div>";
      }
    } else {
      echo "<p>No comments yet. Be the first to comment!</p>";
    }
    $conn->close();
    ?>
  </div>
</div>
</body>
</html>
