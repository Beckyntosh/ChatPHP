<?php
// Simple PHP/MySQL/PDO example for a "User Review and Rating" feature for a Children's Clothing website.

// Database Configuration
define('DB_HOST', 'db');
define('DB_NAME', 'my_database');
define('DB_USER', 'root');
define('DB_PASS', 'root');

// DSN
$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

// Create PDO connection
try {
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

// Create user_reviews table if not exists
$createTableSQL = "CREATE TABLE IF NOT EXISTS user_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    user_name VARCHAR(50),
    rating INT NOT NULL,
    review TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$pdo->exec($createTableSQL);

// Handle Review Submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["user_name"], $_POST["rating"], $_POST["review"], $_POST["product_id"])) {
    $user_name = strip_tags($_POST["user_name"]);
    $rating = (int)$_POST["rating"];
    $review = strip_tags($_POST["review"]);
    $product_id = (int)$_POST["product_id"];

    $insertSQL = "INSERT INTO user_reviews (product_id, user_name, rating, review) VALUES (:product_id, :user_name, :rating, :review)";
    $stmt = $pdo->prepare($insertSQL);
    $stmt->execute([':product_id'=>$product_id, ':user_name'=>$user_name, ':rating'=>$rating, ':review'=>$review]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Review and Rating</title>
</head>
<body>

<h2>User Review and Rating</h2>

<form action="" method="post">
Assume product_id is 1 for demo
    <div>
        <label for="user_name">Name:</label>
        <input type="text" id="user_name" name="user_name" required>
    </div>
    <div>
        <label for="rating">Rating:</label>
        <select id="rating" name="rating" required>
            <option value="1">1 Star</option>
            <option value="2">2 Stars</option>
            <option value="3">3 Stars</option>
            <option value="4">4 Stars</option>
            <option value="5">5 Stars</option>
        </select>
    </div>
    <div>
        <label for="review">Review:</label>
        <textarea id="review" name="review" rows="4" required></textarea>
    </div>
    <input type="submit" value="Submit">
</form>

<hr>

<h2>Reviews</h2>

<?php
// Fetch and display user reviews
$query = "SELECT * FROM user_reviews WHERE product_id = 1 ORDER BY created_at DESC";
$stm = $pdo->query($query);
$reviews = $stm->fetchAll(PDO::FETCH_ASSOC);

foreach ($reviews as $review) {
    echo "<div><strong>" . htmlspecialchars($review['user_name']) . "</strong> (" . htmlspecialchars($review['rating']) . " Star Rating) <br>";
    echo "<p>" . nl2br(htmlspecialchars($review['review'])) . "</p>";
    echo "<small>Reviewed on: " . htmlspecialchars($review['created_at']) . "</small></div><hr>";
}
?>

</body>
</html>
