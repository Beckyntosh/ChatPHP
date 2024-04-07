<?php
// This PHP script is a simplistic approach to demonstrate a single-file music album review and rating web application.
// It's created for educational purposes and not suitable for a production environment without proper security enhancements.

// MySQL connection settings
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they do not exist
$albumTable = "CREATE TABLE IF NOT EXISTS albums (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    artist VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

$reviewTable = "CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    album_id INT(6) UNSIGNED,
    rating DECIMAL(2,1) NOT NULL,
    review TEXT,
    reviewer_name VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (album_id) REFERENCES albums(id)
    )";

if (!$conn->query($albumTable) || !$conn->query($reviewTable)) {
    echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["title"], $_POST["artist"], $_POST["rating"], $_POST["review"], $_POST["reviewer_name"])) {
        $title = $_POST["title"];
        $artist = $_POST["artist"];
        $rating = $_POST["rating"];
        $review = $_POST["review"];
        $reviewer_name = $_POST["reviewer_name"];

        $albumInsert = $conn->prepare("INSERT INTO albums (title, artist) VALUES (?, ?)");
        $albumInsert->bind_param("ss", $title, $artist);
        if ($albumInsert->execute()) {
            $albumId = $albumInsert->insert_id;
            $reviewInsert = $conn->prepare("INSERT INTO reviews (album_id, rating, review, reviewer_name) VALUES (?, ?, ?, ?)");
            $reviewInsert->bind_param("idss", $albumId, $rating, $review, $reviewer_name);
            $reviewInsert->execute();
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Music Album Reviews</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { margin: 0 auto; width: 600px; }
        form { margin-bottom: 20px; }
        input, textarea, select { width: 100%; margin: 5px 0; }
        input[type=submit] { width: auto; }
        .review { border: 1px solid #ccc; padding: 10px; margin: 10px 0; }
    </style>
</head>
<body>
<div class="container">
    <h1>Music Album Review</h1>
    <form method="POST">
        <input type="text" name="title" placeholder="Album Title" required>
        <input type="text" name="artist" placeholder="Artist" required>
        <select name="rating">
            <option value="">Rating</option>
            <?php for ($i = 0.5; $i <= 5; $i += 0.5) { echo "<option value='$i'>$i</option>"; } ?>
        </select>
        <textarea name="review" placeholder="Write your review here..."></textarea>
        <input type="text" name="reviewer_name" placeholder="Your Name" required>
        <input type="submit" value="Submit Review">
    </form>

    <?php
    $sql = "SELECT a.title, a.artist, r.rating, r.review, r.reviewer_name FROM albums a INNER JOIN reviews r ON a.id = r.album_id ORDER BY r.reg_date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='review'><strong>" . $row["title"]. "</strong> by " . $row["artist"]. "<br>Rating: " . $row["rating"]. "<br>Review: " . $row["review"]. "<br>Reviewed by: " . $row["reviewer_name"]. "</div>";
        }
    } else {
        echo "0 reviews";
    }

    $conn->close();
    ?>
</div>
</body>
</html>
