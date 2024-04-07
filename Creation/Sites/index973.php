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

// Create tables if they don't exist
$createBooksTable = "CREATE TABLE IF NOT EXISTS books (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(100) NOT NULL,
author VARCHAR(100) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$createReviewsTable = "CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
book_id INT(6) UNSIGNED NOT NULL,
rating INT(2),
review_text TEXT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
FOREIGN KEY (book_id) REFERENCES books(id)
)";

if (!$conn->query($createBooksTable) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

if (!$conn->query($createReviewsTable) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

function getBooks($conn) {
  $sql = "SELECT * FROM books";
  $result = $conn->query($sql);
  $books = [];
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $books[] = $row;
    }
  }
  return $books;
}

function addReview($bookId, $rating, $reviewText, $conn) {
  $stmt = $conn->prepare("INSERT INTO reviews (book_id, rating, review_text) VALUES (?, ?, ?)");
  $stmt->bind_param("iis", $bookId, $rating, $reviewText);
  $stmt->execute();
  return $stmt->insert_id;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_review'])) {
  $bookId = $_POST['book_id'];
  $rating = $_POST['rating'];
  $reviewText = $_POST['review'];
  addReview($bookId, $rating, $reviewText, $conn);
}

$books = getBooks($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Book Review Section</title>
</head>
<body>
<h1>Book Reviews</h1>

<div>
  <h2>Add a review</h2>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="book_id">Select a book:</label>
    <select name="book_id" id="book_id" required>
      <?php foreach ($books as $book) { ?>
        <option value="<?php echo $book['id']; ?>"><?php echo $book['title']; ?> by <?php echo $book['author']; ?></option>
      <?php } ?>
    </select>
    <label for="rating">Rating:</label>
    <select name="rating" id="rating" required>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
    <label for="review">Review:</label>
    <textarea name="review" id="review" required></textarea>
    <button type="submit" name="submit_review">Submit Review</button>
  </form>
</div>

</body>
</html>
<?php $conn->close(); ?>
