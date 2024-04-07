<?php
// Connection Variables
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'my_database');

// Create Connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS hotel_reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  guest_name VARCHAR(50) NOT NULL,
  review_text TEXT NOT NULL,
  rating INT(1) NOT NULL,
  review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $guest_name = $_POST['guest_name'];
    $review_text = $_POST['review_text'];
    $rating = $_POST['rating'];

    $stmt = $conn->prepare("INSERT INTO hotel_reviews (guest_name, review_text, rating) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $guest_name, $review_text, $rating);

    if (!$stmt->execute()) {
        die("Error: " . $stmt->error);
    }

    echo "<script>alert('Review submitted successfully')</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Review System</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .review-form { margin: 20px auto; padding: 20px; width: 300px; border: 1px solid #333; }
        .review-form input, .review-form textarea, .review-form button { display: block; width: 100%; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="review-form">
        <h2>Leave a Review</h2>
        <form action="" method="post">
            <input type="text" name="guest_name" placeholder="Your Name" required>
            <textarea name="review_text" placeholder="Your Review" required rows="6"></textarea>
            <select name="rating" required>
                <option value="">Rate your stay</option>
                <option value="1">1 - Poor</option>
                <option value="2">2 - Fair</option>
                <option value="3">3 - Good</option>
                <option value="4">4 - Very Good</option>
                <option value="5">5 - Excellent</option>
            </select>
            <button type="submit">Submit Review</button>
        </form>
    </div>
    <h2>Guest Reviews</h2>
    <?php
    $sql = "SELECT * FROM hotel_reviews ORDER BY review_date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p><strong>" . htmlspecialchars($row["guest_name"]) . "</strong> (" . $row["review_date"] . ") 
            <br>Rating: " . $row["rating"] . "/5<br>" . htmlspecialchars($row["review_text"]) . "</p><hr>";
        }
    } else {
        echo "0 reviews";
    }
    $conn->close();
    ?>
</body>
</html>
