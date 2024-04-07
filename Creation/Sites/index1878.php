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

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS comments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
article_id INT(6) UNSIGNED NOT NULL,
username VARCHAR(30) NOT NULL,
comment TEXT NOT NULL,
comment_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    //echo "Table comments created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    $article_id = 1; // Static article ID for demonstration

    $sql = "INSERT INTO comments (article_id, username, comment) VALUES ('$article_id', '$username', '$comment')";

    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comments Section</title>
    <style>
        form, .comment { margin: 20px; padding: 10px; border: 1px solid #ccc; background-color: #f9f9f9; }
        .comment { margin-bottom: 5px; }
    </style>
</head>
<body>
    <h2>Comments</h2>
    <?php
    $sql = "SELECT username, comment, comment_time FROM comments WHERE article_id = 1 ORDER BY comment_time DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='comment'><p><strong>" . htmlspecialchars($row["username"]) . "</strong> says:</p><p>" . htmlspecialchars($row["comment"]) . "</p><p>Posted on: " . $row["comment_time"]. "</p></div>";
        }
    } else {
        echo "0 comments";
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="username">Name:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="comment">Comment:</label><br>
        <textarea id="comment" name="comment" required></textarea><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
<?php $conn->close(); ?>
