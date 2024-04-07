<?php
// Establishing a connection to the database
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
post_id INT(6) UNSIGNED,
comment TEXT,
comment_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === FALSE) {
  echo "Error creating table: " . $conn->error;
}

// Insert a new comment
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["comment"])) {
    $comment = $conn->real_escape_string($_POST["comment"]);
    $post_id = 1; // Example post ID for demonstration (in a real scenario, this will come from the blog post)
    
    $sql = "INSERT INTO comments (post_id, comment) VALUES ('$post_id', '$comment')";

    if ($conn->query($sql) === FALSE) {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Section</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .comment-form {
            margin-bottom: 20px;
        }
        .comments {
            margin-top: 20px;
        }
        .comment {
            padding: 10px;
            border: 1px solid #ccc;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<div class="comment-section">
    <div class="comment-form">
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <label for="comment">Leave a comment:</label><br>
            <textarea id="comment" name="comment" rows="4" cols="50"></textarea><br>
            <input type="submit" value="Submit">
        </form>
    </div>
    
    <div class="comments">
        <h3>Comments:</h3>
        <?php
        // Fetch all comments
        $sql = "SELECT id, comment, comment_time FROM comments WHERE post_id=1 ORDER BY comment_time DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo "<div class='comment'><p>".htmlspecialchars($row["comment"])."</p><p><small>Commented on: ".htmlspecialchars($row["comment_time"])."</small></p></div>";
          }
        } else {
          echo "No comments yet.";
        }
        ?>
    </div>
</div>

<?php
$conn->close();
?>
</body>
</html>
