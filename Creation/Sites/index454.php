<?php
// Simple travel review web app in a single PHP file for educational purposes.

// Error reporting for development (remove in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to MySQL database
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(255) NOT NULL,
    review TEXT NOT NULL,
    rating INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$mysqli->query($sql)) {
    die("ERROR: Could not create table. " . $mysqli->error);
}

// Insert new review if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $destination = $mysqli->real_escape_string($_POST['destination']);
    $review = $mysqli->real_escape_string($_POST['review']);
    $rating = (int) $_POST['rating'];

    $insertSQL = "INSERT INTO reviews (destination, review, rating) VALUES ('$destination', '$review', '$rating')";
    
    if(!$mysqli->query($insertSQL)){
        die("ERROR: Could not able to execute $insertSQL. " . $mysqli->error);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Destination Reviews</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; }
        form { margin: 20px 0; }
        textarea { display: block; margin-bottom: 10px; }
        input[type="submit"] { cursor: pointer; }
        .review { border-bottom: 1px solid #ccc; padding: 10px 0; }
        .rating { font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <h1>Share Your Travel Experience</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label>Destination:
            <input type="text" name="destination" required>
        </label>
        <label>Review:
            <textarea name="review" rows="5" required></textarea>
        </label>
        <label>Rating:
            <input type="number" name="rating" min="1" max="5" required>
        </label>
        <input type="submit" value="Submit Review">
    </form>

    <h2>Latest Reviews</h2>
    <?php
    // Fetch all reviews
    $result = $mysqli->query("SELECT destination, review, rating, created_at FROM reviews ORDER BY created_at DESC");

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='review'>";
            echo "<h3>". htmlspecialchars($row['destination']) ."</h3>";
            echo "<div class='rating'>Rating: ". htmlspecialchars($row['rating']) ."</div>";
            echo "<p>". nl2br(htmlspecialchars($row['review'])) ."</p>";
            echo "<small>Posted on ". htmlspecialchars($row['created_at']) ."</small>";
            echo "</div>";
        }
    } else {
        echo "No reviews yet. Be the first to share your experience!";
    }

    // Close connection
    $mysqli->close();
    ?>
</div>
</body>
</html>
