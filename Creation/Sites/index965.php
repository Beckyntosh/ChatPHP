<?php
// Simple Restaurant Review Platform

// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Create tables if not exists
$createTables = "
CREATE TABLE IF NOT EXISTS restaurants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    restaurant_id INT NOT NULL,
    rating_food INT NOT NULL,
    rating_service INT NOT NULL,
    rating_ambiance INT NOT NULL,
    review_text TEXT NOT NULL,
    submission_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (restaurant_id) REFERENCES restaurants(id)
);
";

if (mysqli_multi_query($conn, $createTables)) {
    do {
        if ($result = mysqli_store_result($conn)) {
            mysqli_free_result($result);
        }
    } while (mysqli_next_result($conn));
}

// Handle review submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_review'])) {
    $restaurant_id = $_POST['restaurant_id'];
    $rating_food = $_POST['rating_food'];
    $rating_service = $_POST['rating_service'];
    $rating_ambiance = $_POST['rating_ambiance'];
    $review_text = $_POST['review_text'];
    
    $sql = "INSERT INTO reviews (restaurant_id, rating_food, rating_service, rating_ambiance, review_text) VALUES (?, ?, ?, ?, ?)";
    
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "iiiss", $param_restaurant_id, $param_rating_food, $param_rating_service, $param_rating_ambiance, $param_review_text);
        
        $param_restaurant_id = $restaurant_id;
        $param_rating_food = $rating_food;
        $param_rating_service = $rating_service;
        $param_rating_ambiance = $rating_ambiance;
        $param_review_text = $review_text;
        
        if (mysqli_stmt_execute($stmt)){
            header("location: " . $_SERVER['PHP_SELF']);
        } else{
            echo "Something went wrong. Please try again later.";
        }
    }
    
    mysqli_stmt_close($stmt);
    
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Restaurant Reviews</title>
</head>
<body>
    <h1>Add a Review</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>Restaurant ID:</label>
            <input type="number" name="restaurant_id" required>
        </div>
        <div>
            <label>Rating for Food (1-5):</label>
            <input type="number" name="rating_food" min="1" max="5" required>
        </div>
        <div>
            <label>Rating for Service (1-5):</label>
            <input type="number" name="rating_service" min="1" max="5" required>
        </div>
        <div>
            <label>Rating for Ambiance (1-5):</label>
            <input type="number" name="rating_ambiance" min="1" max="5" required>
        </div>
        <div>
            <label>Review:</label>
            <textarea name="review_text" required></textarea>
        </div>
        <div>
            <input type="submit" name="submit_review" value="Submit Review">
        </div>
    </form>
</body>
</html>
