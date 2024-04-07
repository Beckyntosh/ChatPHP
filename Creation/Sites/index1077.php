<?php
// Establish database connection
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
$albumTableSql = "CREATE TABLE IF NOT EXISTS albums (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    artist VARCHAR(255),
    release_year YEAR,
    cover_url VARCHAR(255),
    reg_date TIMESTAMP
)";

$reviewTableSql = "CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    album_id INT(6) UNSIGNED,
    user VARCHAR(255) NOT NULL,
    rating INT(1),
    review TEXT,
    review_date TIMESTAMP,
    FOREIGN KEY (album_id) REFERENCES albums(id)
)";

if (!$conn->query($albumTableSql) === TRUE || !$conn->query($reviewTableSql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Insert new review to the database
    $album_id = $conn->real_escape_string($_POST['album_id']);
    $user = $conn->real_escape_string($_POST['user']);
    $rating = $conn->real_escape_string($_POST['rating']);
    $review = $conn->real_escape_string($_POST['review']);

    $insertSql = "INSERT INTO reviews (album_id, user, rating, review)
    VALUES ('$album_id', '$user', '$rating', '$review')";

    if ($conn->query($insertSql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Music Album Reviews and Ratings</title>
</head>
<body>
    <h1>Submit Review</h1>
    <form action="" method="post">
        <label for="album_id">Album ID:</label><br>
        <input type="text" id="album_id" name="album_id"><br>
        <label for="user">Your Name:</label><br>
        <input type="text" id="user" name="user"><br>
        <label for="rating">Rating (1-5):</label><br>
        <input type="number" id="rating" name="rating" min="1" max="5"><br>
        <label for="review">Review:</label><br>
        <textarea id="review" name="review" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
    <h2>Album Reviews</h2>
    <?php
    $sql = "SELECT albums.title, albums.artist, reviews.user, reviews.rating, reviews.review, reviews.review_date FROM reviews JOIN albums ON reviews.album_id = albums.id ORDER BY reviews.review_date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div><strong>" . htmlspecialchars($row["title"]) . " by " . htmlspecialchars($row["artist"]) . "</strong><br>"
                . htmlspecialchars($row["user"]) . " rated it " . htmlspecialchars($row["rating"]) . "/5<br>"
                . htmlspecialchars($row["review"]) . "<br>"
                . "<small>Reviewed on " . $row["review_date"] . "</small></div><hr>";
        }
    } else {
        echo "No reviews yet!";
    }
    $conn->close();
    ?>
</body>
</html>
