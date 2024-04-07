<?php
// Connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$createTablesSQL = "CREATE TABLE IF NOT EXISTS books (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255),
    publish_year INT(4),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);";
$createTablesSQL .= "CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    book_id INT(6) UNSIGNED,
    user VARCHAR(255) NOT NULL,
    rating INT(1),
    review TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (book_id) REFERENCES books(id)
);";

if (!$conn->multi_query($createTablesSQL)) {
    echo "Error creating tables: " . $conn->error;
}

// Wait for the multi queries to finish
do {
    if ($res = $conn->store_result()) {
        $res->free();
    }
} while ($conn->next_result());

// Handle form submission for new review
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bookId = $conn->real_escape_string($_POST['book_id']);
    $user = $conn->real_escape_string($_POST['user']);
    $rating = $conn->real_escape_string($_POST['rating']);
    $review = $conn->real_escape_string($_POST['review']);

    $insertSQL = "INSERT INTO reviews (book_id, user, rating, review) VALUES ('$bookId', '$user', '$rating', '$review')";
    if (!$conn->query($insertSQL)) {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Review and Recommendation Engine</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 800px; margin: auto; }
    </style>
</head>
<body>
<div class="container">
    <h1>Book Review and Recommendation Engine</h1>
Form for review submission
    <form action="" method="post">
        <h2>Submit a Review</h2>
        <p>
            <label for="book_id">Book ID:</label>
            <input type="text" id="book_id" name="book_id" required>
        </p>
        <p>
            <label for="user">Your Name:</label>
            <input type="text" id="user" name="user" required>
        </p>
        <p>
            <label for="rating">Rating (1-5):</label>
            <input type="number" id="rating" name="rating" min="1" max="5" required>
        </p>
        <p>
            <label for="review">Review:</label>
            <textarea id="review" name="review" required></textarea>
        </p>
        <button type="submit">Submit Review</button>
    </form>

    <h2>Book Reviews</h2>
    <?php
    $reviewsSQL = "SELECT books.title, reviews.user, reviews.rating, reviews.review FROM reviews LEFT JOIN books ON reviews.book_id = books.id ORDER BY reviews.created_at DESC";
    $result = $conn->query($reviewsSQL);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div><h3>" . htmlspecialchars($row['title']) . "</h3><p>Reviewed by: " . htmlspecialchars($row['user']) . "</p><p>Rating: " . htmlspecialchars($row['rating']) . "</p><p>" . nl2br(htmlspecialchars($row['review'])) . "</p></div>";
        }
    } else {
        echo "No reviews yet.";
    }

    $conn->close();
    ?>
</div>
</body>
</html>
