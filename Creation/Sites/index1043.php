<?php
// Connection
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

// Create tables if not exists
$sql_movies = "CREATE TABLE IF NOT EXISTS movies (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(50) NOT NULL,
release_year YEAR NOT NULL,
genre VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";

$sql_reviews = "CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
movie_id INT(6) UNSIGNED NOT NULL,
user VARCHAR(30) NOT NULL,
rating FLOAT NOT NULL,
review TEXT,
reg_date TIMESTAMP,
FOREIGN KEY (movie_id) REFERENCES movies(id)
)";

if ($conn->query($sql_movies) === FALSE || $conn->query($sql_reviews) === FALSE) {
  echo "Error creating tables: " . $conn->error;
}

// Inserting a review
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_review'])) {
  $movie_id = $_POST['movie_id'];
  $user = $_POST['user'];
  $rating = $_POST['rating'];
  $review = htmlspecialchars($_POST['review']);
  
  $sql_insert = "INSERT INTO reviews (movie_id, user, rating, review)
  VALUES ('$movie_id', '$user', '$rating', '$review')";
  
  if ($conn->query($sql_insert) === TRUE) {
    echo "New review added!";
  } else {
    echo "Error: " . $sql_insert . "<br>" . $conn->error;
  }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Movie Rating and Review Platform</title>
<style>
body {font-family: 'Sherlock Holmes', serif;}
</style>
</head>
<body>

<h2>Movie Review Form</h2>

<form method="post">
  Movie ID: <input type="text" name="movie_id" required><br>
  User: <input type="text" name="user" required><br>
  Rating: <select name="rating">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select><br>
  Review: <textarea name="review" required></textarea><br>
  <input type="submit" name="submit_review">
</form>

<h2>Movie Reviews</h2>
<?php
$sql_select = "SELECT movies.title, reviews.user, reviews.rating, reviews.review 
FROM reviews 
JOIN movies ON movies.id = reviews.movie_id 
ORDER BY reviews.reg_date DESC";

$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<b>Movie:</b> " . $row["title"]. " - <b>User:</b> " . $row["user"]. " - <b>Rating:</b> " . $row["rating"]. "/5 - <b>Review:</b> " . $row["review"]. "<br>";
  }
} else {
  echo "No reviews yet";
}
$conn->close();
?>

</body>
</html>
