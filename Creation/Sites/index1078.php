<?php

// Connect to the database
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

// SQL to create table if not exists
$albumReviewTable = "CREATE TABLE IF NOT EXISTS album_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    album_name VARCHAR(255) NOT NULL,
    reviewer_name VARCHAR(255) NOT NULL,
    review TEXT NOT NULL,
    rating INT(1) NOT NULL,
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($albumReviewTable) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check for POST request to insert a new review
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $album_name = $_POST['album_name'];
    $reviewer_name = $_POST['reviewer_name'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];

    $sql = "INSERT INTO album_reviews (album_name, reviewer_name, review, rating) VALUES ('$album_name', '$reviewer_name', '$review', '$rating')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album Review and Rating System</title>
</head>
<body>
    <h1>Submit your album review</h1>
    <form action="" method="post">
        Album Name: <input type="text" name="album_name" required><br>
        Your Name: <input type="text" name="reviewer_name" required><br>
        Review: <textarea name="review" required></textarea><br>
        Rating: <select name="rating" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br>
        <input type="submit" value="Submit Review">
    </form>
    
    <h2>Album Reviews</h2>
    <?php
    $sql = "SELECT album_name, reviewer_name, review, rating FROM album_reviews ORDER BY review_date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<p><b>Album Name:</b> " . $row["album_name"]. " - <b>Reviewer:</b> " . $row["reviewer_name"]. " - <b>Rating:</b> " . $row["rating"]. "/5" . "<br><b>Review:</b> " . $row["review"]. "</p>";
        }
    } else {
        echo "No reviews yet.";
    }
    $conn->close();
    ?>
</body>
</html>
