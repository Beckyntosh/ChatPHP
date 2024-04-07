<?php

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

// Create tables if not exist
$createBooksTable = "CREATE TABLE IF NOT EXISTS books (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
author VARCHAR(255),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$createReviewsTable = "CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
book_id INT(6) UNSIGNED,
review_text TEXT,
rating INT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
FOREIGN KEY (book_id) REFERENCES books(id)
)";

if ($conn->query($createBooksTable) === TRUE && $conn->query($createReviewsTable) === TRUE) {
    // Tables created successfully
} else {
    echo "Error creating tables: " . $conn->error;
}

// Insert a new review
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $bookId = $_POST["book_id"];
  $reviewText = $_POST["review_text"];
  $rating = $_POST["rating"];

  $stmt = $conn->prepare("INSERT INTO reviews (book_id, review_text, rating) VALUES (?, ?, ?)");
  $stmt->bind_param("isi", $bookId, $reviewText, $rating);

  if ($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Review and Recommendation</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { margin: 0 auto; width: 800px; }
        .review, .book { margin-bottom: 20px; }
        .review textarea { width: 100%; }
    </style>
</head>
<body>

<div class="container">
    <h2>Submit a Book Review</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="book">
            <label for="book_id">Book ID:</label>
            <input type="text" id="book_id" name="book_id" required>
        </div>
        <div class="review">
            <label for="review_text">Review:</label>
            <textarea id="review_text" name="review_text" required></textarea>
        </div>
        <div class="rating">
            <label for="rating">Rating:</label>
            <select id="rating" name="rating" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <input type="submit" value="Submit Review">
    </form>

    <h2>Book Reviews</h2>
    <?php
    $sql = "SELECT books.title, books.author, reviews.review_text, reviews.rating FROM reviews JOIN books ON reviews.book_id = books.id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='review'><strong>Title:</strong> " . $row["title"]. " - <strong>Author:</strong> " . $row["author"]. "<br><strong>Review:</strong> " . $row["review_text"]. "<br><strong>Rating:</strong> " . $row["rating"]. "</div>";
        }
    } else {
        echo "No reviews found";
    }
    $conn->close();
    ?>
</div>

</body>
</html>
