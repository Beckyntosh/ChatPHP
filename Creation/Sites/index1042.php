<?php
// Connection parameters
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
$moviesTable = "CREATE TABLE IF NOT EXISTS movies (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
release_year YEAR NOT NULL,
genre VARCHAR(50),
UNIQUE KEY unique_title_year (title, release_year)
)";

$reviewsTable = "CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
movie_id INT(6) UNSIGNED,
rating INT(1) NOT NULL CHECK (rating >= 1 AND rating <= 5),
review TEXT,
FOREIGN KEY (movie_id) REFERENCES movies(id)
)";

if ($conn->query($moviesTable) === TRUE && $conn->query($reviewsTable) === TRUE) {
  // Tables created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert a new review
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST['title'];
  $release_year = $_POST['release_year'];
  $genre = $_POST['genre'];
  $rating = $_POST['rating'];
  $review = $_POST['review'];

  // Insert movie if it doesn't exist
  $insertMovie = "INSERT INTO movies (title, release_year, genre) VALUES ('$title', '$release_year', '$genre')
                  ON DUPLICATE KEY UPDATE id=LAST_INSERT_ID(id), genre=VALUES(genre)";
                    
  if ($conn->query($insertMovie) === TRUE) {
    $movie_id = $conn->insert_id;
    $insertReview = "INSERT INTO reviews (movie_id, rating, review) VALUES ('$movie_id', '$rating', '$review')";
    if ($conn->query($insertReview) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $insertReview . "<br>" . $conn->error;
    }
  } else {
    echo "Error: " . $insertMovie . "<br>" . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Movie Rating and Review Platform</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fafafa;
    }

    .container {
      margin: 20px auto;
      width: 80%;
      background-color: #eee;
      padding: 20px;
      border-radius: 8px;
    }

    input[type="text"], input[type="number"], select, textarea {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Submit Movie Review</h2>
  <form action="" method="post">
    <label for="title">Movie Title</label>
    <input type="text" id="title" name="title" required>

    <label for="release_year">Release Year</label>
    <input type="number" id="release_year" name="release_year" required>

    <label for="genre">Genre</label>
    <input type="text" id="genre" name="genre">

    <label for="rating">Rating</label>
    <select id="rating" name="rating">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5" selected>5</option>
    </select>

    <label for="review">Review</label>
    <textarea id="review" name="review" style="height:200px"></textarea>

    <input type="submit" value="Submit Review">
  </form>
</div>

</body>
</html>

<?php
$conn->close();
?>
