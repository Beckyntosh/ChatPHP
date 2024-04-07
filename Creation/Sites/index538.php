<?php
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS comments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
post_id INT(6) UNSIGNED,
comment TEXT,
comment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert new comment
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $post_id = 1; // Static post_id for demonstration; in a real scenario, this would be dynamic
  $comment = $conn->real_escape_string($_POST['comment']);

  $sql = "INSERT INTO comments (post_id, comment) VALUES ('$post_id', '$comment')";

  if ($conn->query($sql) === TRUE) {
    echo "<p>Comment added successfully</p>";
  } else {
    echo "<p>Error adding comment: " . $conn->error . "</p>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Blog Comment Section</title>
<style>
body { font-family: Arial, sans-serif; }
.container { max-width: 800px; margin: auto; }
.comment-box { margin-top: 20px; }
.comment { margin-bottom: 10px; padding: 10px; background-color: #f2f2f2; }
</style>
</head>
<body>
<div class="container">
  <h2>Leave a Comment</h2>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <textarea name="comment" rows="4" cols="50" required></textarea><br>
    <button type="submit">Submit</button>
  </form>

  <div class="comment-box">
    <h3>Comments</h3>
    <?php
    $sql = "SELECT comment, comment_date FROM comments WHERE post_id = 1 ORDER BY comment_date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<div class='comment'><p>" . htmlspecialchars($row['comment']) . "</p><p><small>" . $row['comment_date'] . "</small></p></div>";
      }
    } else {
      echo "<p>No comments yet!</p>";
    }
    $conn->close();
    ?>
  </div>
</div>
</body>
</html>