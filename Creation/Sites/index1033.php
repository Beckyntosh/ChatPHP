<?php
// Connection data
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
postId INT(6) UNSIGNED,
author VARCHAR(30) NOT NULL,
comment TEXT NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle comment submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $postId = htmlspecialchars($_POST["postId"]);
  $author = htmlspecialchars($_POST["author"]);
  $comment = htmlspecialchars($_POST["comment"]);

  $stmt = $conn->prepare("INSERT INTO comments (postId, author, comment) VALUES (?, ?, ?)");
  $stmt->bind_param("iss", $postId, $author, $comment);

  if ($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Comments Section</title>
<style>
  body { font-family: Arial, sans-serif; }
  .comment-box { margin-top: 20px; }
  .comment { margin-bottom: 10px; padding: 5px; border: 1px solid #ddd; }
</style>
</head>
<body>

<h2>Comment Section</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
Static value for example purposes
  <label for="author">Name:</label><br>
  <input type="text" id="author" name="author" required><br>
  <label for="comment">Comment:</label><br>
  <textarea id="comment" name="comment" rows="4" required></textarea><br><br>
  <input type="submit" value="Submit">
</form>

<div class="comment-box">
  <?php
  $conn = new mysqli($servername, $username, $password, $dbname);
  $sql = "SELECT author, comment, reg_date FROM comments WHERE postId=1 ORDER BY reg_date DESC";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<div class='comment'><strong>" . $row["author"]. "</strong>: " . $row["comment"]. " <br><small>" . $row["reg_date"]. "</small></div>";
    }
  } else {
    echo "No comments yet. Be the first to comment!";
  }
  $conn->close();
  ?>
</div>

</body>
</html>
