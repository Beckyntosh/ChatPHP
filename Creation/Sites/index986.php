<?php
// Database Connection
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

// Create table for reviews if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    rating INT NOT NULL,
    review TEXT,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$pdo->exec($sql);

// Handle the Review Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];
    
    $sql = "INSERT INTO reviews (user_name, rating, review) VALUES (?, ?, ?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$name, $rating, $review]);    

    echo '<p>Your review has been submitted!</p>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel App Reviews</title>
</head>
<body>
    <h2>Leave a Review for Our Travel App</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <p>
            <label for="name">Your Name:</label>
            <input type="text" name="name" id="name" required>
        </p>
        <p>
            <label for="rating">Your Rating:</label>
            <select name="rating" id="rating" required>
                <option value="5">5 Stars</option>
                <option value="4">4 Stars</option>
                <option value="3">3 Stars</option>
                <option value="2">2 Stars</option>
                <option value="1">1 Star</option>
            </select>
        </p>
        <p>
            <label for="review">Your Review:</label>
            <textarea name="review" id="review" rows="5" required></textarea>
        </p>
        <p>
            <input type="submit" value="Submit Review">
        </p>
    </form>
    <hr>
    <h3>User Reviews</h3>
    <?php
    $sql = "SELECT * FROM reviews ORDER BY submission_date DESC";
    $stmt = $pdo->query($sql);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div>";
        echo "<h4>" . htmlspecialchars($row['user_name']) . " - " . $row['rating'] . " Stars</h4>";
        echo "<p>" . nl2br(htmlspecialchars($row['review'])) . "</p>";
        echo "</div>";
    }
    ?>
</body>
</html>
This is a single-file PHP web application that includes both the front-end and the back-end parts for adding and displaying reviews and ratings for a travel app website. The database connection is configured for a MySQL database. Note: Ensure your PHP and MySQL environments are properly set up and that the credentials match your database details.