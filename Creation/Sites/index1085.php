


<?php
// Database connection settings
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create tables if they don't exist
try {
    $createTable = "CREATE TABLE IF NOT EXISTS gadgets (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        review TEXT NOT NULL,
        rating DECIMAL(3,2) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($createTable);
} catch(PDOException $e) {
    die("ERROR: Could not create table. " . $e->getMessage());
}

// Insert a new review
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["title"]) && !empty($_POST["review"]) && !empty($_POST["rating"])) {
    $query = "INSERT INTO gadgets (title, review, rating) VALUES (:title, :review, :rating)";

    if ($stmt = $pdo->prepare($query)) {
        $stmt->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
        $stmt->bindParam(':review', $_POST['review'], PDO::PARAM_STR);
        $stmt->bindParam(':rating', $_POST['rating'], PDO::PARAM_STR);

        if (!$stmt->execute()) {
            echo "ERROR: Could not able to execute $query. " . print_r($pdo->errorInfo());
        }
    }
}

// Retrieve all reviews
$query = "SELECT * FROM gadgets ORDER BY created_at DESC";
$reviews = $pdo->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Gadget Review and Rating Portal</title>
<style>
    body { font: 14px sans-serif; }
    .wrapper { width: 750px; padding: 20px; margin: auto; }
    .review { border-bottom: 1px solid #ccc; margin-bottom: 20px; padding-bottom: 20px; }
    .rating { color: gold; }
</style>
</head>
<body>
    <div class="wrapper">
        <h2>Submit a Gadget Review</h2>
        <form action="" method="post">
            <div>
                <label>Title</label>
                <input type="text" name="title" required>
            </div>
            <div>
                <label>Review</label>
                <textarea name="review" required></textarea>
            </div>
            <div>
                <label>Rating</label>
                <input type="number" step="0.01" min="0" max="5" name="rating" required>
            </div>
            <input type="submit" value="Submit">
        </form>
        
        <h2>Latest Reviews</h2>
        <?php while ($row = $reviews->fetch()): ?>
        <div class="review">
            <h3><?php echo htmlspecialchars($row['title'], ENT_QUOTES); ?></h3>
            <p><?php echo nl2br(htmlspecialchars($row['review'], ENT_QUOTES)); ?></p>
            <p>Rating: <span class="rating"><?php echo htmlspecialchars($row['rating'], ENT_QUOTES); ?>/5</span></p>
        </div>
        <?php endwhile; ?>
    </div>
</body>
</html>

Remember to adjust the database settings and credentials as per your environment, and ensure this PHP script has the right permissions and configurations to run on your server. Additional features like user authentication, input validation, and enhanced UI/UX considerations should be implemented for a production-grade application.