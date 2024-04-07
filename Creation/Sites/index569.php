<!DOCTYPE html>
<html>
<head>
    <title>Comment Section</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; }
        .comment-box { margin-top: 20px; }
        .comment-box textarea { width: 100%; padding: 10px; }
        .comment-box button { padding: 10px 15px; background-color: #4CAF50; color: white; border: none; margin-top: 10px; }
        .comments { margin-top: 20px; }
        .comment { background-color: #f2f2f2; padding: 10px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Comments</h2>
        <div class="comment-box">
            <form action="" method="post">
                <textarea name="comment" placeholder="Add a comment..."></textarea>
                <button type="submit" name="submit">Post Comment</button>
            </form>
        </div>
        <div class="comments">
Display comments here
        </div>
    </div>

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
        comment TEXT NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        // Table created successfully
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // Post comment
    if (isset($_POST['submit'])) {
        $comment = $conn->real_escape_string($_POST['comment']);
        $sql = "INSERT INTO comments (comment) VALUES ('$comment')";

        if ($conn->query($sql) === TRUE) {
            // Comment posted successfully
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Display comments
    $sql = "SELECT * FROM comments ORDER BY reg_date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='comment'><p>" . $row["comment"] . "</p><p><small>" . $row["reg_date"] . "</small></p></div>";
        }
    } else {
        echo "No comments yet.";
    }

    $conn->close();
    ?>
</body>
</html>
