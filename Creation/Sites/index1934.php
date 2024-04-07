<?php
// Simple Code Review Platform for Medieval Groceries Website
// Please adjust MySQL credentials and database details as per your environment.

// Database Configuration
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DB', 'my_database');
define('MYSQL_SERVER', 'db');

// Initialize session
session_start();

// Connect to the MySQL database
$pdo = new PDO('mysql:host='.MYSQL_SERVER.';dbname='.MYSQL_DB, MYSQL_USER, MYSQL_PASSWORD);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Create the necessary tables if they don't exist
$pdo->exec("CREATE TABLE IF NOT EXISTS code_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    feature_name VARCHAR(255) NOT NULL,
    code_text TEXT NOT NULL,
    submitted DATETIME DEFAULT CURRENT_TIMESTAMP
)");

$pdo->exec("CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    review_id INT NOT NULL,
    commenter VARCHAR(255) NOT NULL,
    comment TEXT NOT NULL,
    commented_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(review_id) REFERENCES code_reviews(id) ON DELETE CASCADE
)");

$message = '';

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['source_code']) && !empty($_FILES['source_code']['tmp_name'])) {
    $feature_name = $_POST['feature_name'] ?? 'Unknown Feature';
    $code_text = file_get_contents($_FILES['source_code']['tmp_name']);
    
    $stmt = $pdo->prepare("INSERT INTO code_reviews (feature_name, code_text) VALUES (:feature_name, :code_text)");
    $stmt->execute([':feature_name' => $feature_name, ':code_text' => $code_text]);
    
    $message = 'Source code uploaded successfully!';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Medieval Groceries - Code Review</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #f4f4f2;
            color: #3e3e3c;
            padding: 20px;
        }
        form, .reviews, .comments {
            margin-bottom: 20px;
        }
        textarea {
            width: 100%;
            height: 150px;
        }
        .review, .comment {
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 10px;
            background-color: #fafafa;
        }
    </style>
</head>
<body>
<h1>Medieval Groceries - Code Review Platform</h1>

<?php if ($message): ?>
<p><?= htmlspecialchars($message) ?></p>
<?php endif; ?>

<h2>Upload Source Code for Review</h2>
<form method="post" enctype="multipart/form-data">
    <label for="feature_name">Feature Name:</label><br>
    <input type="text" id="feature_name" name="feature_name" required><br><br>
    <label for="source_code">Source Code:</label><br>
    <input type="file" id="source_code" name="source_code" required><br><br>
    <button type="submit">Upload Code</button>
</form>

<h2>Submitted Reviews</h2>
<div class="reviews">
    <?php
    $reviews = $pdo->query("SELECT * FROM code_reviews ORDER BY submitted DESC")->fetchAll(PDO::FETCH_ASSOC);
    foreach ($reviews as $review): ?>
        <div class="review">
            <h3><?= htmlspecialchars($review['feature_name']) ?></h3>
            <pre><?= htmlspecialchars($review['code_text']) ?></pre>
            <div class="comments">
                <h4>Comments</h4>
                <?php
                $comments = $pdo->prepare("SELECT * FROM comments WHERE review_id = :review_id ORDER BY commented_at DESC");
                $comments->execute([':review_id' => $review['id']]);
                $comments = $comments->fetchAll(PDO::FETCH_ASSOC);
                foreach ($comments as $comment): ?>
                    <div class="comment">
                        <strong><?= htmlspecialchars($comment['commenter']) ?>:</strong>
                        <p><?= htmlspecialchars($comment['comment']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
