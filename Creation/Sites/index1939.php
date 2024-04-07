<?php
// Connect to the database
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
);

$pdo = new PDO(
    "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE, 
    MYSQL_USER, 
    MYSQL_PASSWORD, 
    $pdoOptions
);

// Create tables if they don't exist
$sql = "CREATE TABLE IF NOT EXISTS code_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    code TEXT NOT NULL,
    status ENUM('pending', 'approved', 'rejected') NOT NULL DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$pdo->exec($sql);

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['title']) && !empty($_FILES['sourceCode']['name'])) {
    $title = $_POST['title'];
    $code = file_get_contents($_FILES['sourceCode']['tmp_name']);
    $status = 'pending';

    $query = "INSERT INTO code_reviews (title, code, status) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title, $code, $status]);

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Retrieve all code reviews
$query = "SELECT * FROM code_reviews ORDER BY created_at DESC";
$stmt = $pdo->prepare($query);
$stmt->execute();
$codeReviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Review System</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .container { max-width: 800px; margin: auto; }
        .review { border: 1px solid #ddd; padding: 10px; margin-bottom: 20px; }
        .review h2 { font-size: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Submit Code for Review</h1>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Feature title" required>
            <input type="file" name="sourceCode" required>
            <button type="submit">Upload</button>
        </form>

        <h2>Code Reviews</h2>
        <?php foreach ($codeReviews as $review): ?>
            <div class="review">
                <h2><?= htmlspecialchars($review['title']) ?></h2>
                <pre><?= htmlspecialchars($review['code']) ?></pre>
                <p>Status: <?= htmlspecialchars($review['status']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
