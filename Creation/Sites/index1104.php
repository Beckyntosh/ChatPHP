<?php
// Define database connection parameters
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'my_database');

// Establish a database connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$tablesSql = <<<SQL
CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL
);
CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_id INT,
    user VARCHAR(255),
    rating INT,
    review TEXT,
    FOREIGN KEY (book_id) REFERENCES books(id)
);
SQL;

// Execute multi query
if ($conn->multi_query($tablesSql)) {
    do {
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->next_result());
}

// Handle form submission for new reviews
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_review'])) {
    $book_id = $conn->real_escape_string($_POST['book_id']);
    $user = $conn->real_escape_string($_POST['user']);
    $rating = $conn->real_escape_string($_POST['rating']);
    $review = $conn->real_escape_string($_POST['review']);

    $insertSql = "INSERT INTO reviews (book_id, user, rating, review) VALUES ('$book_id', '$user', '$rating', '$review')";

    if (!$conn->query($insertSql)) {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Review and Recommendation</title>
</head>
<body>
    <h1>Book Reviews</h1>
    <form action="" method="post">
        <label for="book_id">Book:</label>
        <select id="book_id" name="book_id" required>
            <?php
            $booksSql = "SELECT id, title FROM books";
            $result = $conn->query($booksSql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<option value="'. $row["id"] .'">' . $row["title"] . '</option>';
                }
            }
            ?>
        </select>
        <br>
        <label for="user">Your Name:</label>
        <input type="text" id="user" name="user" required><br>
        <label for="rating">Rating:</label>
        <input type="number" id="rating" name="rating" min="1" max="5" required><br>
        <label for="review">Review:</label>
        <textarea id="review" name="review" required></textarea><br>
        <input type="submit" name="submit_review" value="Submit Review">
    </form>

    <h2>Reviews</h2>
    <?php
    $reviewSql = "SELECT books.title, reviews.user, reviews.rating, reviews.review FROM reviews JOIN books ON books.id = reviews.book_id ORDER BY reviews.id DESC";
    $result = $conn->query($reviewSql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p><strong>" . htmlspecialchars($row['title']) . "</strong> by " . htmlspecialchars($row['user']) . " - Rating: " . $row['rating'] . "/5</p>";
            echo "<p>" . htmlspecialchars($row['review']) . "</p>";
            echo "<hr>";
        }
    } else {
        echo "No reviews yet.";
    }
    ?>

</body>
</html>

<?php
$conn->close();
?>
