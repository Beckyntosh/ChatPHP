<?php
// Database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exists
$commentsTable = "CREATE TABLE IF NOT EXISTS comments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
post_id INT(6) UNSIGNED,
author VARCHAR(50),
comment TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($commentsTable) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle new comment submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["comment"])) {
  $post_id = $conn->real_escape_string($_POST["post_id"]);
  $author = $conn->real_escape_string($_POST["author"]);
  $comment = $conn->real_escape_string($_POST["comment"]);

  $sql = "INSERT INTO comments (post_id, author, comment) VALUES ('$post_id', '$author', '$comment')";

  if ($conn->query($sql) !== TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Retrieve comments for a specific blog post
$post_id = 1; // Example post_id, change as per your requirements
$sql = "SELECT author, comment, reg_date FROM comments WHERE post_id=$post_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comments Section</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            background-color: #f4f4f9;
            color: #333;
        }
        .comment-box {
            margin: 20px auto;
            padding: 10px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            max-width: 600px;
        }
        .comment-form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin: 20px auto;
            max-width: 600px;
        }
        .comment-form input, .comment-form textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .comment-form button {
            padding: 10px 20px;
            background-color: #5a5a5a;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .comment {
            margin-bottom: 10px;
            padding: 10px;
            background: #eaeaea;
            border-radius: 5px;
        }
        .author {
            font-weight: bold;
        }
        .date {
            font-size: 0.8em;
        }
    </style>
</head>
<body>
    <div class="comment-form">
        <form action="" method="post">
            <input type="hidden" name="post_id" value="1">
            <input type="text" name="author" placeholder="Your name">
            <textarea name="comment" placeholder="Leave a comment"></textarea>
            <button type="submit">Post Comment</button>
        </form>
    </div>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='comment-box'><div class='comment'><span class='author'>" . htmlspecialchars($row["author"]) . "</span> <span class='date'>" . $row["reg_date"]. "</span><p>" . htmlspecialchars($row["comment"]) . "</p></div></div>";
        }
    } else {
        echo "<p>No comments yet. Be the first to comment!</p>";
    }
    ?>
</body>
</html>

<?php
$conn->close();
?>
