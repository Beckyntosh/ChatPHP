


<?php
// Simple Movie Rating & Review Platform Script

// Database connection variables
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

// Create table for movies if it doesn't exist
$moviesTable = "CREATE TABLE IF NOT EXISTS movies (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    release_year YEAR NOT NULL,
    reg_date TIMESTAMP
)";

$conn->query($moviesTable);

// Create table for reviews if it doesn't exist
$reviewsTable = "CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    movie_id INT(6) UNSIGNED NOT NULL,
    user_name VARCHAR(255) NOT NULL,
    rating INT(1) NOT NULL,
    review TEXT,
    review_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (movie_id) REFERENCES movies(id)
)";

$conn->query($reviewsTable);

// Assuming data from form submission is processed here for brevity
// In reality, you'd want to check these values thoroughly to prevent SQL injection and ensure data integrity
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movieId = $_POST['movie_id'];
    $userName = $_POST['user_name'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    $stmt = $conn->prepare("INSERT INTO reviews (movie_id, user_name, rating, review) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isis", $movieId, $userName, $rating, $review);
    $stmt->execute();

    echo "New records created successfully";
    $stmt->close();
}

// Fetch and display reviews
$sortOrder = isset($_GET['sort']) ? $_GET['sort'] : 'date'; // Default sort by date
$orderBy = $sortOrder == 'usefulness' ? 'rating DESC, review_date DESC' : 'review_date DESC'; // Assuming 'usefulness' correlates with higher ratings

$sql = "SELECT movies.title, reviews.user_name, reviews.rating, reviews.review, reviews.review_date FROM reviews JOIN movies ON reviews.movie_id = movies.id ORDER BY $orderBy";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Title: " . $row["title"]. " - Name: " . $row["user_name"]. " - Rating: " . $row["rating"]. " - Review: " . $row["review"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Movie Reviews</title>
    <style>
        /* Add your futuristic styles here */
    </style>
</head>
<body>
    <form action="" method="post">
Assuming movie_id is known/selected already, would ideally be a select option populated from the movies table
        Movie ID: <input type="text" name="movie_id"><br>
        User Name: <input type="text" name="user_name"><br>
        Rating: <input type="number" name="rating" min="1" max="5"><br>
        Review: <textarea name="review"></textarea><br>
        <input type="submit">
    </form>
</body>
</html>

Keep in mind, this is an extremely simplified example intended only for academic purposes. Deploying a web application, especially for handling user-generated content, involves much more consideration regarding security, data validation, scalability, user experience, and overall architecture.