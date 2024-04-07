<?php
// Define MySQL connection details
define("MYSQL_USER", 'root');
define("MYSQL_PASSWORD", 'root');
define("MYSQL_DATABASE", 'my_database');
define("MYSQL_SERVER", 'db');

// Establish a connection to the database
$connection = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Create tables if they don't exist
$createReviewsTable = "
CREATE TABLE IF NOT EXISTS reviews (
id INT AUTO_INCREMENT PRIMARY KEY,
product_name VARCHAR(255) NOT NULL,
review TEXT NOT NULL,
rating TINYINT NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Create the table
$connection->query($createReviewsTable);

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["review"])) {
    $productName = $connection->real_escape_string($_POST["product_name"]);
    $reviewText = $connection->real_escape_string($_POST["review"]);
    $rating = intval($connection->real_escape_string($_POST["rating"]));
    
    // Insert the review into the database
    $insertQuery = "INSERT INTO reviews (product_name, review, rating) VALUES ('$productName', '$reviewText', $rating)";
    
    if ($connection->query($insertQuery) === TRUE) {
        echo "<p>Review submitted successfully!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $connection->error . "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gadget Review Portal</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .review-container, .submit-form { margin-top: 20px; }
        .submit-form input, .submit-form textarea, .submit-form button { display: block; margin-top: 10px; }
    </style>
</head>
<body>
    <h1>Gadget Reviews and Ratings</h1>
    <div class="submit-form">
        <form action="" method="post">
            <input type="text" name="product_name" placeholder="Product Name" required>
            <textarea name="review" placeholder="Your review here..." required></textarea>
            <select name="rating" required>
                <option value="1">1 - Poor</option>
                <option value="2">2 - Fair</option>
                <option value="3">3 - Good</option>
                <option value="4">4 - Very Good</option>
                <option value="5">5 - Excellent</option>
            </select>
            <button type="submit">Submit Review</button>
        </form>
    </div>
    <div class="review-container">
        <h2>Latest Reviews</h2>
        <?php
        $query = "SELECT * FROM reviews ORDER BY created_at DESC";
        $result = $connection->query($query);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='review'>";
                echo "<h3>" . htmlspecialchars($row["product_name"]) . "</h3>";
                echo "<p>Rating: " . htmlspecialchars($row["rating"]) . "</p>";
                echo "<p>" . htmlspecialchars($row["review"]) . "</p>";
                echo "<p>Reviewed on: " . $row["created_at"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No reviews yet. Be the first to review!</p>";
        }
        ?>
    </div>
</body>
</html>
<?php
$connection->close();
?>
