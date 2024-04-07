<?php
// Define the MySQL connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to the MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create comments table if it doesn't exist
try {
    $sql = "CREATE TABLE IF NOT EXISTS comments (
        id INT AUTO_INCREMENT PRIMARY KEY,
        post_id INT NOT NULL,
        name VARCHAR(50) NOT NULL,
        comment TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);
} catch (PDOException $e) {
    die("ERROR: Could not create table. " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment'])) {
    $name = htmlspecialchars(strip_tags($_POST['name']));
    $comment = htmlspecialchars(strip_tags($_POST['comment']));
    $post_id = 1; // statically setting `post_id` for this example. In a real-world scenario, this should come from the actual post.

    $sql = "INSERT INTO comments (post_id, name, comment) VALUES (:post_id, :name, :comment)";

    if ($stmt = $pdo->prepare($sql)) {
        $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "<script>alert('Comment added successfully.');</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again later.');</script>";
        }

        unset($stmt);
    }
}

unset($pdo);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Section for Blog Posts</title>
    <style>
        .container { max-width: 800px; margin: auto; }
        form { margin-bottom: 20px; }
        form input, form textarea { width: 100%; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Leave a Comment</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="name" placeholder="Your Name" required>
            <textarea name="comment" rows="5" placeholder="Your Comment" required></textarea>
            <button type="submit">Submit Comment</button>
        </form>

        <?php
        // Display comments
        try {
            $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT * FROM comments WHERE post_id = 1"; // statically setting `post_id` for the purpose of example
            $stmt = $pdo->query($sql);
            
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch()) {
                    echo "<div><h4>" . htmlspecialchars($row['name']) . "</h4><p>" . htmlspecialchars($row['comment']) . "</p><small>" . htmlspecialchars($row['created_at']) . "</small></div>";
                }
            } else {
                echo "<p>No comments yet.</p>";
            }
        } catch (PDOException $e) {
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }

        unset($pdo);
        ?>
    </div>
</body>
</html>

