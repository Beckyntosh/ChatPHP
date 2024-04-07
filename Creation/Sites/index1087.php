<?php
// Database connection settings
define('DB_HOST', 'db');
define('DB_NAME', 'my_database');
define('DB_USER', 'root');
define('DB_PASS', 'root');

// Connect to the database
try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database " . DB_NAME . ": " . $e->getMessage());
}

// Create table if it doesn't exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS fitness_class_ratings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    class_name VARCHAR(255) NOT NULL,
    rating INT NOT NULL,
    feedback TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$pdo->exec($createTableQuery);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["rateClass"])) {
    $className = $_POST['className'];
    $rating = $_POST['rating'];
    $feedback = $_POST['feedback'];

    $insertQuery = "INSERT INTO fitness_class_ratings (class_name, rating, feedback) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($insertQuery);
    $stmt->execute([$className, $rating, $feedback]);
}

// Fetch all class ratings
$query = "SELECT * FROM fitness_class_ratings ORDER BY created_at DESC";
$stmt = $pdo->query($query);
$classRatings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fitness Class Ratings</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #eee; }
        .container { width: 80%; margin: auto; background: #fff; padding: 20px; }
        .rating-form, .ratings-list { margin-top: 20px; }
        textarea { width: 100%; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Rate a Fitness Class</h1>
        <form method="POST" class="rating-form">
            <label for="className">Class Name:</label>
            <input type="text" id="className" name="className" required><br><br>
            <label for="rating">Rating:</label>
            <select id="rating" name="rating" required>
                <option value="1">1 - Poor</option>
                <option value="2">2 - Fair</option>
                <option value="3">3 - Good</option>
                <option value="4">4 - Very Good</option>
                <option value="5">5 - Excellent</option>
            </select><br><br>
            <label for="feedback">Feedback:</label><br>
            <textarea id="feedback" name="feedback" rows="4" required></textarea><br><br>
            <button type="submit" name="rateClass">Submit Rating</button>
        </form>

        <div class="ratings-list">
            <h2>Class Ratings</h2>
            <?php foreach ($classRatings as $rating): ?>
                <div class="rating">
                    <h3><?php echo htmlspecialchars($rating['class_name']); ?> (Rated <?php echo $rating['rating']; ?>/5)</h3>
                    <p><?php echo htmlspecialchars($rating['feedback']); ?></p>
                    <small>Rated on: <?php echo $rating['created_at']; ?></small>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
