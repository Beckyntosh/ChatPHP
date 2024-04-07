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

// Create comments table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS comments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
article_id INT(6) UNSIGNED NOT NULL,
username VARCHAR(30) NOT NULL,
comment TEXT NOT NULL,
comment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handling comment submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["username"]) && !empty($_POST["comment"])) {
  $article_id = $conn->real_escape_string($_POST["article_id"]);
  $username = $conn->real_escape_string($_POST["username"]);
  $comment = $conn->real_escape_string($_POST["comment"]);

  $sql = "INSERT INTO comments (article_id, username, comment) VALUES ('$article_id', '$username', '$comment')";

  if ($conn->query($sql) === TRUE) {
    echo "Comment successfully submitted.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>News Article Comments</title>
<style>
  body { font-family: Arial, sans-serif; }
  .comment-container { margin-top: 20px; }
  .comment { margin-bottom: 10px; padding: 10px; border: 1px solid #ccc; }
  .comment-date { font-size: 0.8em; }
</style>
</head>
<body>
<h2>Discuss This Article</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
Example article_id
  <label for="username">Name:</label><br>
  <input type="text" id="username" name="username" required><br>
  <label for="comment">Comment:</label><br>
  <textarea id="comment" name="comment" rows="4" required></textarea><br>
  <button type="submit">Submit</button>
</form>

<div class="comment-container">
<?php
// Fetching comments
$sql = "SELECT username, comment, comment_date FROM comments WHERE article_id = 1 ORDER BY comment_date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<div class='comment'><strong>" . htmlspecialchars($row["username"]) . "</strong><p>" . htmlspecialchars($row["comment"]) . "</p><span class='comment-date'>" . $row["comment_date"] . "</span></div>";
  }
} else {
  echo "No comments yet. Be the first to comment!";
}
$conn->close();
?>
</div>
</body>
</html>
