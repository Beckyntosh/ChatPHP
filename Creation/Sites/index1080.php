<?php
// Set up a connection to the database
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

// Attempt to create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS comments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
article_id INT(6) UNSIGNED NOT NULL,
user VARCHAR(30) NOT NULL,
comment TEXT NOT NULL,
comment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle comment submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $article_id = htmlspecialchars($_POST['article_id']);
  $user = htmlspecialchars($_POST['user']);
  $comment = htmlspecialchars($_POST['comment']);

  $stmt = $conn->prepare("INSERT INTO comments (article_id, user, comment) VALUES (?, ?, ?)");
  $stmt->bind_param("iss", $article_id, $user, $comment);
  
  if($stmt->execute()){
    echo "<p>Comment successfully added!</p>";
  } else {
    echo "<p>Error adding comment: " . $conn->error . "</p>";
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
<title>Comments Section</title>
<style>
  body { font-family: Arial, sans-serif; }
  .comment-box { margin: 20px 0; padding: 10px; border: 1px solid #ddd; background-color: #f9f9f9; }
  .comment-form { margin-top: 40px; }
  input[type="text"], textarea { width: 100%; padding: 10px; margin-bottom: 20px; }
  input[type="submit"] { background-color: #ff66b3; color: white; padding: 10px 20px; border: none; cursor: pointer; }
  input[type="submit"]:hover { background-color: #cc0052; }
</style>
</head>
<body>
<h2>Reader Comments</h2>

<div class="comments">
  <?php
  $conn = new mysqli($servername, $username, $password, $dbname);
  $sql = "SELECT id, article_id, user, comment, comment_date FROM comments ORDER BY comment_date DESC";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<div class='comment-box'>";
      echo "<p><strong>" . htmlspecialchars($row["user"]) . "</strong> <span>" . $row["comment_date"] . "</span></p>";
      echo "<p>" . htmlspecialchars($row["comment"]) . "</p>";
      echo "</div>";
    }
  } else {
    echo "No comments yet.";
  }
  $conn->close();
  ?>
</div>

<div class="comment-form">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
Static article ID for demo
    <label for="user">Name:</label>
    <input type="text" id="user" name="user" required>

    <label for="comment">Comment:</label>
    <textarea id="comment" name="comment" required></textarea>

    <input type="submit" value="Submit">
  </form>
</div>
</body>
</html>
