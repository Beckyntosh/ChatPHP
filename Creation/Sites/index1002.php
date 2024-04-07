<?php

// Connection & setup
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
$sql = "CREATE TABLE IF NOT EXISTS albums (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    artist VARCHAR(50),
    release_year YEAR,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) !== TRUE) {
  die("Error creating table: " . $conn->error);
}

$sql = "CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    album_id INT(6) UNSIGNED,
    user VARCHAR(50),
    rating INT(1),
    comment TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (album_id) REFERENCES albums(id)
    )";

if ($conn->query($sql) !== TRUE) {
  die("Error creating table: " . $conn->error);
}

// Handle POST request for new reviews
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $album_id = $_POST['album_id'];
  $user = $_POST['user'];
  $rating = $_POST['rating'];
  $comment = $_POST['comment'];

  $stmt = $conn->prepare("INSERT INTO reviews (album_id, user, rating, comment) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("isis", $album_id, $user, $rating, $comment);

  if ($stmt->execute() === TRUE) {
    echo "<p>Review successfully added.</p>";
  } else {
    echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
  }

  $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Music Album Reviews</title>
</head>
<body>
<h1>Submit a Review</h1>
<form action="" method="post">
  <label for="album_id">Album ID:</label><br>
  <input type="number" id="album_id" name="album_id"><br>
  <label for="user">User:</label><br>
  <input type="text" id="user" name="user"><br>
  <label for="rating">Rating (1-5):</label><br>
  <input type="number" id="rating" name="rating" min="1" max="5"><br>
  <label for="comment">Comment:</label><br>
  <textarea id="comment" name="comment"></textarea><br><br>
  <input type="submit" value="Submit Review">
</form>

<h2>Album Reviews</h2>

Display reviews
<?php
$sql = "SELECT albums.name AS album_name, reviews.* FROM reviews JOIN albums ON reviews.album_id = albums.id ORDER BY reviews.reg_date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<div><strong>" . $row["album_name"]. "</strong> by " . $row["user"]. " - Rating: " . $row["rating"]. "/5<br>" . $row["comment"]. "<br><br></div>";
  }
} else {
  echo "0 reviews";
}

$conn->close();
?>

</body>
</html>
