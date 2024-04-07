<?php
// Connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}

// Create table for reviews if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS board_game_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(50) NOT NULL,
    review TEXT NOT NULL,
    rating INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTable)) {
    die("ERROR: Could not create table " . $conn->error);
}

// Post review
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $userName = $conn->real_escape_string($_POST['userName']);
    $review = $conn->real_escape_string($_POST['review']);
    $rating = $conn->real_escape_string($_POST['rating']);

    $insertSQL = "INSERT INTO board_game_reviews (user_name, review, rating) VALUES ('$userName', '$review', '$rating')";

    if (!$conn->query($insertSQL)) {
        echo "ERROR: Could not able to execute $insertSQL. " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Board Games Reviews</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0e7d1; }
        .container { width: 800px; margin: auto; }
        .review-form { background-color: #d3c0b3; padding: 20px; margin-top: 20px; }
        .reviews { background-color: #bfa89e; padding: 20px; margin-top: 20px; }
        .review { margin-bottom: 10px; }
        .review p { margin: 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Board Games Reviews</h1>
        <div class="review-form">
            <h2>Leave a Review</h2>
            <form action="" method="POST">
                <input type="text" name="userName" placeholder="Your Name" required><br><br>
                <textarea name="review" placeholder="Your Review" required></textarea><br><br>
                <select name="rating" required>
                    <option value="">Rating</option>
                    <option value="1">1 - Poor</option>
                    <option value="2">2 - Fair</option>
                    <option value="3">3 - Good</option>
                    <option value="4">4 - Very Good</option>
                    <option value="5">5 - Excellent</option>
                </select><br><br>
                <input type="submit" value="Submit Review">
            </form>
        </div>
        <div class="reviews">
            <h2>User Reviews</h2>
            <?php
            $sql = "SELECT * FROM board_game_reviews ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='review'><p><strong>" . htmlspecialchars($row['user_name']) . ":</strong> " . htmlspecialchars($row['rating']) . "/5</p>";
                    echo "<p>" . htmlspecialchars($row['review']) . "</p></div>";
                }
            } else {
                echo "<p>No reviews yet. Be the first to review!</p>";
            }
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
