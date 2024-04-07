<?php
// Connection variables
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

// Create table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS album_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    album_name VARCHAR(50) NOT NULL,
    reviewer_name VARCHAR(50),
    review_text VARCHAR(255),
    rating INT(1),
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($tableSql) === TRUE) {
    echo "";
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert review
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $albumName = $_POST['albumName'];
    $reviewerName = $_POST['reviewerName'];
    $reviewText = $_POST['reviewText'];
    $rating = $_POST['rating'];

    $insertSql = "INSERT INTO album_reviews (album_name, reviewer_name, review_text, rating)
    VALUES ('$albumName', '$reviewerName', '$reviewText', '$rating')";

    if ($conn->query($insertSql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Music Album Review and Rating</title>
</head>
<body>
<h2>Add Album Review</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="albumName">Album Name:</label><br>
    <input type="text" id="albumName" name="albumName" required><br>
    <label for="reviewerName">Your Name:</label><br>
    <input type="text" id="reviewerName" name="reviewerName" required><br>
    <label for="reviewText">Review:</label><br>
    <textarea id="reviewText" name="reviewText" required></textarea><br>
    <label for="rating">Rating:</label><br>
    <select id="rating" name="rating" required>
        <option value="">Select a rating</option>
        <option value="1">1 - Poor</option>
        <option value="2">2 - Fair</option>
        <option value="3">3 - Good</option>
        <option value="4">4 - Very Good</option>
        <option value="5">5 - Excellent</option>
    </select><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>
