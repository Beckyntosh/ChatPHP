<?php

// Database credentials
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to the database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Reviews Table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS product_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    user_name VARCHAR(255) NOT NULL,
    rating INT NOT NULL,
    review TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($createTable)) {
    die("Error creating table: " . $conn->error);
}

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitReview"])) {
    $productId = $conn->real_escape_string($_POST["productId"]);
    $userName = $conn->real_escape_string($_POST["userName"]);
    $rating = $conn->real_escape_string($_POST["rating"]);
    $review = $conn->real_escape_string($_POST["review"]);

    $insertSql = "INSERT INTO product_reviews (product_id, user_name, rating, review) VALUES ('$productId', '$userName', '$rating', '$review')";
    if ($conn->query($insertSql) === TRUE) {
        echo "<p>Review submitted successfully!</p>";
    } else {
        echo "<p>Error: " . $insertSql . "<br>" . $conn->error . "</p>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Review System</title>
    <style>
        .review-form, .review-list { margin: 20px; padding: 20px; border: 1px solid #000; }
        .review-item { border-bottom: 1px solid #ddd; padding: 10px; }
    </style>
</head>
<body>
    <div class="review-form">
        <h2>Leave a Review</h2>
        <form action="" method="POST">
Example Product ID
            <p><label>Your Name: <input type="text" name="userName" required></label></p>
            <p><label>Rating: <input type="number" name="rating" min="1" max="5" required></label></p>
            <p><label>Review: <textarea name="review" required></textarea></label></p>
            <p><button type="submit" name="submitReview">Submit Review</button></p>
        </form>
    </div>
    <div class="review-list">
        <h2>Product Reviews</h2>
        <?php
        $productId = 1; // Example Product ID
        $sql = "SELECT user_name, rating, review, created_at FROM product_reviews WHERE product_id='$productId' ORDER BY created_at DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='review-item'>";
                echo "<p>Rating: " . str_repeat("★", $row["rating"]) . "</p>";
                echo "<p>" . htmlspecialchars($row["review"]) . "</p>";
                echo "<p><em>By " . htmlspecialchars($row["user_name"]) . " on " . $row["created_at"] . "</em></p>";
                echo "</div>";
            }
        } else {
            echo "<p>No reviews yet. Be the first to review!</p>";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
