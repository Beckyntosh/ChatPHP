<?php
// Simple Travel Destination Reviews Platform
// Connect to database
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

// Create tables if not exist
$createTables = "
CREATE TABLE IF NOT EXISTS destinations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    location VARCHAR(255),
    image VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination_id INT,
    rating INT,
    review TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (destination_id) REFERENCES destinations(id)
);
";

if ($conn->multi_query($createTables)) {
    do {
        // Ensure execute multi_query success for each statement
        if (!$conn->more_results()) {
            break;
        }
    } while ($conn->next_result());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["review"]) && isset($_POST["destination_id"])) {
    $destination_id = $conn->real_escape_string($_POST["destination_id"]);
    $rating = $conn->real_escape_string($_POST["rating"]);
    $review = $conn->real_escape_string($_POST["review"]);
    
    $sql = "INSERT INTO reviews (destination_id, rating, review) VALUES ('$destination_id', '$rating', '$review')";

    if (!$conn->query($sql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Destination Reviews</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .destination { margin-bottom: 20px; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        .review { margin-bottom: 10px; padding: 10px; border-bottom: 1px solid #eee; }
    </style>
</head>
<body>
    <h2>Travel Destination Reviews</h2>
    <form action="" method="post">
        <label for="destination_id">Destination:</label>
        <select name="destination_id" required>
            <?php
            $destinations = $conn->query("SELECT * FROM destinations");
            while ($destination = $destinations->fetch_assoc()) {
                echo "<option value='{$destination['id']}'>{$destination['name']}</option>";
            }
            ?>
        </select>
        <label for="rating">Rating:</label>
        <select name="rating" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <label for="review">Review:</label>
        <textarea name="review" required></textarea>
        <button type="submit">Submit Review</button>
    </form>
    <h3>Reviews</h3>
    <?php
    $reviews = $conn->query("SELECT reviews.*, destinations.name AS destination_name FROM reviews JOIN destinations ON reviews.destination_id = destinations.id ORDER BY created_at DESC");
    while ($review = $reviews->fetch_assoc()) {
        echo "<div class='review'>";
        echo "<h4>{$review['destination_name']} - Rating: {$review['rating']}</h4>";
        echo "<p>{$review['review']}</p>";
        echo "<small>Posted on: {$review['created_at']}</small>";
        echo "</div>";
    }
    ?>
</body>
</html>
<?php $conn->close(); ?>
