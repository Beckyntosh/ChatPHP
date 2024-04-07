<?php
// Connection params
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connecting to the database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$moviesTableQuery = "CREATE TABLE IF NOT EXISTS movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    release_year YEAR NOT NULL
)";

$reviewsTableQuery = "CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    movie_id INT NOT NULL,
    user_name VARCHAR(50) NOT NULL,
    rating INT NOT NULL,
    review TEXT NOT NULL,
    helpful_count INT DEFAULT 0,
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (movie_id) REFERENCES movies(id) ON DELETE CASCADE
)";

$conn->query($moviesTableQuery);
$conn->query($reviewsTableQuery);

// Insert a movie
if (isset($_POST["addMovie"])) {
    $movieName = $conn->real_escape_string($_POST["movieName"]);
    $releaseYear = $conn->real_escape_string($_POST["releaseYear"]);

    $insertMovie = "INSERT INTO movies (name, release_year) VALUES ('$movieName', '$releaseYear')";
    $conn->query($insertMovie);
}

// Add a review
if (isset($_POST["addReview"])) {
    $movieId = $conn->real_escape_string($_POST["movieId"]);
    $userName = $conn->real_escape_string($_POST["userName"]);
    $rating = $conn->real_escape_string($_POST["rating"]);
    $review = $conn->real_escape_string($_POST["review"]);

    $insertReview = "INSERT INTO reviews (movie_id, user_name, rating, review) VALUES ('$movieId', '$userName', '$rating', '$review')";
    $conn->query($insertReview);
}

// Fetching movies
$movies = $conn->query("SELECT * FROM movies");

// Fetching reviews, sorting based on query parameter
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'review_date';
$reviews = $conn->query("SELECT * FROM reviews JOIN movies ON movies.id = reviews.movie_id ORDER BY " . $sort . " DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Organic Movie Reviews</title>
</head>
<body>
    <h1>Add a Movie</h1>
    <form method="POST">
        <label>Movie Name: </label><input type="text" name="movieName" required>
        <label>Release Year: </label><input type="number" name="releaseYear" required>
        <input type="submit" name="addMovie" value="Add Movie">
    </form>

    <h1>Add a Review</h1>
    <form method="POST">
        <label>Movie: </label>
        <select name="movieId" required>
            <?php while($movie = $movies->fetch_assoc()): ?>
                <option value="<?= $movie["id"] ?>"><?= $movie["name"] ?></option>
            <?php endwhile; ?>
        </select>
        <label>User Name: </label><input type="text" name="userName" required>
        <label>Rating (1-5): </label><input type="number" name="rating" min="1" max="5" required>
        <label>Review: </label><textarea name="review" required></textarea>
        <input type="submit" name="addReview" value="Add Review">
    </form>

    <h2>Movie Reviews</h2>
    <form method="GET">
        <label>Sort Reviews By: </label>
        <select onchange="this.form.submit()" name="sort">
            <option value="review_date">Date</option>
            <option value="helpful_count">Usefulness</option>
        </select>
    </form>
    <div>
        <?php while($review = $reviews->fetch_assoc()): ?>
            <div>
                <h3><?= $review["name"] ?> (<?= $review["release_year"] ?>)</h3>
                <p><?= $review["review"] ?></p>
                <p>Rating: <?= $review["rating"] ?>/5</p>
                <p>Reviewed by <?= $review["user_name"] ?> on <?= $review["review_date"] ?></p>
                <p>Helpful: <?= $review["helpful_count"] ?></p>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
<?php
$conn->close();
?>
