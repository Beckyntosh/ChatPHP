<?php
// Set error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

// Create comments table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS comments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_id INT(6) NOT NULL,
    author VARCHAR(30) NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = 1; // Assuming a single blog post. In a real scenario, this should be dynamic.
    $author = htmlspecialchars($_POST["author"]);
    $comment = htmlspecialchars($_POST["comment"]);

    $stmt = $conn->prepare("INSERT INTO comments (post_id, author, comment) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $post_id, $author, $comment);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comment Section for Blog Posts</title>
    <style>
        .comment-box {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
        }
        form > * {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1>Comments</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="author">Name:</label><br>
        <input type="text" id="author" name="author" required><br>
        <label for="comment">Comment:</label><br>
        <textarea id="comment" name="comment" required></textarea><br>
        <input type="submit" value="Submit">
    </form>

    <div id="comments-section">
        <?php
        $sql = "SELECT author, comment, created_at FROM comments WHERE post_id = 1 ORDER BY created_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='comment-box'>";
                echo "<p><strong>" . $row["author"] . "</strong> (" . $row["created_at"] . ")</p>";
                echo "<p>" . $row["comment"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "No comments yet!";
        }
        ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
