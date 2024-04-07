<?php
// Connection configuration
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

// Create Movies table if it does not exist
$createMoviesTable = "CREATE TABLE IF NOT EXISTS movies (
  movie_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  release_year INT(4),
  genre VARCHAR(50),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$conn->query($createMoviesTable);

// Create Reviews table if it does not exist
$createReviewsTable = "CREATE TABLE IF NOT EXISTS reviews (
  review_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  movie_id INT(6) UNSIGNED,
  user_name VARCHAR(255) NOT NULL,
  rating INT(1) NOT NULL,
  comment TEXT,
  usefulness INT DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (movie_id) REFERENCES movies(movie_id) ON DELETE CASCADE
)";

$conn->query($createReviewsTable);

// Function to add a movie to the database
function addMovie($title, $release_year, $genre, $conn) {
    $stmt = $conn->prepare("INSERT INTO movies (title, release_year, genre) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $title, $release_year, $genre);
    $stmt->execute();
    $stmt->close();
}

// Function to add a review to a movie
function addReview($movie_id, $user_name, $rating, $comment, $usefulness, $conn) {
    $stmt = $conn->prepare("INSERT INTO reviews (movie_id, user_name, rating, comment, usefulness) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isisi", $movie_id, $user_name, $rating, $comment, $usefulness);
    $stmt->execute();
    $stmt->close();
}

// Frontend HTML for displaying movies and their reviews
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Movie Rating and Review Platform</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
    }
    .container {
      width: 90%;
      margin: auto;
      overflow: hidden;
    }
    .movie {
      background-color: #fff;
      padding: 20px;
      margin-bottom: 20px;
    }
    .review {
      padding: 12px;
      background-color: #e9e9e9;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
<div class="container">
  <h1>Movie Reviews</h1>
  <?php
  $sql = "SELECT * FROM movies";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    while($movie = $result->fetch_assoc()) {
      echo "<div class='movie'><h2>" . htmlspecialchars($movie["title"]) . " (" . intval($movie["release_year"]) . ")</h2><p>Genre: " . htmlspecialchars($movie["genre"]) . "</p>";
      
      // Fetch reviews for this movie
      $reviewsSql = "SELECT * FROM reviews WHERE movie_id=" . $movie['movie_id'] . " ORDER BY created_at DESC";
      $reviewsResult = $conn->query($reviewsSql);
      
      if ($reviewsResult->num_rows > 0) {
        while($review = $reviewsResult->fetch_assoc()) {
          echo "<div class='review'><strong>User:</strong> ". htmlspecialchars($review["user_name"]) .", <strong>Rating:</strong> " . intval($review["rating"]) . "/5" . "<br><strong>Comment:</strong> " . htmlspecialchars($review["comment"]) . "</div>";
        }
      } else {
        echo "<p>No reviews yet.</p>";
      }
      echo "</div>";
    }
  } else {
    echo "0 results";
  }
  ?>
</div>
</body>
</html>

<?php
$conn->close();
?>
