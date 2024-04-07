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

$sql = "CREATE TABLE IF NOT EXISTS Albums (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    artist VARCHAR(255) NOT NULL,
    release_year YEAR,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Albums created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS Reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    album_id INT(6) UNSIGNED,
    user VARCHAR(255) NOT NULL,
    rating DECIMAL(2,1) NOT NULL,
    review TEXT,
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (album_id) REFERENCES Albums(id) ON DELETE CASCADE
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Reviews created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $album_title = $_POST['album_title'];
  $album_artist = $_POST['album_artist'];
  $user = $_POST['user'];
  $rating = $_POST['rating'];
  $review = $_POST['review'];

  $album_sql = "INSERT INTO Albums (title, artist) VALUES ('$album_title', '$album_artist')";
  if ($conn->query($album_sql) === TRUE) {
    $last_album_id = $conn->insert_id;
    $review_sql = "INSERT INTO Reviews (album_id, user, rating, review) VALUES ('$last_album_id', '$user', '$rating', '$review')";
    if ($conn->query($review_sql) === TRUE) {
      echo "<p>Review added successfully!</p>";
    } else {
      echo "<p>Error adding review: " . $conn->error . "</p>";
    }
  } else {
    echo "<p>Error adding album: " . $conn->error . "</p>";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Music Album Reviews</title>
</head>
<body>
<h1>Submit a Review</h1>
<form method="post" action="">
    Album Title: <input type="text" name="album_title" required><br>
    Album Artist: <input type="text" name="album_artist" required><br>
    Your Name: <input type="text" name="user" required><br>
    Rating (0.0 - 5.0): <input type="number" step="0.1" name="rating" min="0" max="5" required><br>
    Review: <textarea name="review"></textarea><br>
    <input type="submit" value="Submit Review">
</form>
</body>
</html>
