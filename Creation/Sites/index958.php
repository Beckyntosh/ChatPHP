<?php
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

// Create table if not exists
$createTable = "CREATE TABLE IF NOT EXISTS comments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
post_id INT(6) UNSIGNED,
commenter_name VARCHAR(50) NOT NULL,
comment TEXT NOT NULL,
comment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($createTable)) {
  echo "Error creating table: " . $conn->error;
}

// Handle new comment submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = 1; // Assuming a single post for simplicity
    $commenter_name = $_POST['name'];
    $comment_text = $_POST['comment'];

    $stmt = $conn->prepare("INSERT INTO comments (post_id, commenter_name, comment) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $post_id, $commenter_name, $comment_text);
    $stmt->execute();
    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comment Section</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .comment-box { margin-bottom: 20px; border: 1px solid #ccc; padding: 10px; }
        .comment-box p { margin: 5px 0; }
    </style>
</head>
<body>

<h2>Comments</h2>

Comment form
<form action="" method="post">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br>
    <label for="comment">Comment:</label><br>
    <textarea id="comment" name="comment" required></textarea><br><br>
    <input type="submit" value="Submit">
</form>

Display comments
<?php
$query = "SELECT commenter_name, comment, comment_date FROM comments WHERE post_id = 1 ORDER BY comment_date DESC";
$result = $conn->query($query);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<div class='comment-box'>";
    echo "<p><strong>" . $row["commenter_name"]. "</strong> - " . $row["comment_date"]. "</p>";
    echo "<p>" . $row["comment"]. "</p>";
    echo "</div>";
  }
} else {
  echo "No comments yet.";
}
$conn->close();
?>

</body>
</html>
