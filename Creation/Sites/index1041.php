<?php
// Create connection to the database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create the tables if they do not exist
$moviesSql = "CREATE TABLE IF NOT EXISTS movies (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  release_year YEAR NOT NULL,
  genre VARCHAR(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$reviewsSql = "CREATE TABLE IF NOT EXISTS reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  movie_id INT(6) UNSIGNED,
  user VARCHAR(100),
  rating INT(1),
  review TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (movie_id) REFERENCES movies(id) ON DELETE CASCADE
)";

if ($conn->query($moviesSql) === TRUE && $conn->query($reviewsSql) === TRUE) {
  // Tables created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle movie review form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_review'])) {
    $movie_id = $_POST['movie_id'];
    $user = $_POST['user'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    $stmt = $conn->prepare("INSERT INTO reviews (movie_id, user, rating, review) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isis", $movie_id, $user, $rating, $review);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie Rating and Review Platform</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 800px; margin: auto; }
        form { margin-bottom: 20px; }
        label, input, textarea { display: block; margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Rate and Review Movies</h1>
        <form action="" method="post">
            <label for="movie_id">Movie</label>
            <select name="movie_id" id="movie_id" required>
                <?php
                $result = $conn->query("SELECT id, title FROM movies");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['title'] . "</option>";
                }
                ?>
            </select>

            <label for="user">Your Name:</label>
            <input type="text" name="user" id="user" required>

            <label for="rating">Rating (1-5):</label>
            <input type="number" name="rating" id="rating" min="1" max="5" required>

            <label for="review">Review:</label>
            <textarea name="review" id="review" rows="4" required></textarea>

            <input type="submit" name="submit_review" value="Submit Review">
        </form>
        
        <h2>Movie Reviews</h2>
        <?php
        $reviewsSql = "SELECT m.title, r.user, r.rating, r.review FROM reviews r JOIN movies m ON r.movie_id = m.id ORDER BY r.created_at DESC";
        $result = $conn->query($reviewsSql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div><strong>" . $row["title"]. "</strong> by " . $row["user"]. " - Rating: " . $row["rating"]. "/5<br>" . $row["review"]. "<br><br></div>";
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
