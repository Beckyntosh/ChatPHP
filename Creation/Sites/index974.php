<?php
// Setting up the database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they do not exist
$sql = "CREATE TABLE IF NOT EXISTS books (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    book_id INT(6) UNSIGNED,
    rating INT(1),
    review TEXT,
    reg_date TIMESTAMP,
    FOREIGN KEY (book_id) REFERENCES books(id)
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Insert a new review
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    $checkBookSql = "SELECT id FROM books WHERE title = '$title' AND author = '$author'";
    $result = $conn->query($checkBookSql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $bookId = $row['id'];
    } else {
        // If book doesn't exist, insert it
        $insertBookSql = "INSERT INTO books (title, author) VALUES ('$title', '$author')";
        if ($conn->query($insertBookSql) === TRUE) {
            $bookId = $conn->insert_id;
        } else {
            echo "Error: " . $insertBookSql . "<br>" . $conn->error;
        }
    }

    $insertReviewSql = "INSERT INTO reviews (book_id, rating, review) VALUES ('$bookId', '$rating', '$review')";
    if ($conn->query($insertReviewSql) === TRUE) {
        echo '<script>alert("Review submitted successfully");</script>';
    } else {
        echo "Error: " . $insertReviewSql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Reviews</title>
</head>

<body>
    <h2>Submit a Book Review</h2>
    <form method="post" action="">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="author">Author:</label><br>
        <input type="text" id="author" name="author" required><br>
        <label for="rating">Rating:</label><br>
        <select id="rating" name="rating" required>
            <option value="1">1 - Poor</option>
            <option value="2">2 - Fair</option>
            <option value="3">3 - Good</option>
            <option value="4">4 - Very Good</option>
            <option value="5">5 - Excellent</option>
        </select><br>
        <label for="review">Review:</label><br>
        <textarea id="review" name="review" required></textarea><br>
        <input type="submit" value="Submit">
    </form>

    <h2>Book Reviews</h2>
    <?php
    $sql = "SELECT books.title, books.author, reviews.rating, reviews.review FROM books JOIN reviews ON books.id = reviews.book_id ORDER BY reviews.reg_date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p><strong>Title:</strong> " . $row["title"]. " - <strong>Author:</strong> " . $row["author"]. " - <strong>Rating:</strong> " . $row["rating"]. "/5" . "<br><strong>Review:</strong> " . $row["review"]. "</p>";
        }
    } else {
        echo "No reviews yet.";
    }
    $conn->close();
    ?>
</body>

</html>
