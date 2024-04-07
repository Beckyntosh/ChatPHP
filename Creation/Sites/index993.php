<?php
// Database configuration settings
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create tables if not exists
try {
    $reviewsTableQuery = "CREATE TABLE IF NOT EXISTS reviews (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            destination VARCHAR(255) NOT NULL,
                            hotel VARCHAR(255),
                            attraction VARCHAR(255),
                            review TEXT NOT NULL,
                            rating INT NOT NULL,
                            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                        )";
    $pdo->exec($reviewsTableQuery);
} catch(PDOException $e){
    die("ERROR: Could not able to execute $reviewsTableQuery. " . $e->getMessage());
}

// Insert review
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $destination = trim($_POST['destination']);
    $hotel = trim($_POST['hotel']);
    $attraction = trim($_POST['attraction']);
    $review = trim($_POST['review']);
    $rating = trim($_POST['rating']);

    $sql = "INSERT INTO reviews (destination, hotel, attraction, review, rating) VALUES (:destination, :hotel, :attraction, :review, :rating)";
    if($stmt = $pdo->prepare($sql)){
        $stmt->bindParam(":destination", $destination, PDO::PARAM_STR);
        $stmt->bindParam(":hotel", $hotel, PDO::PARAM_STR);
        $stmt->bindParam(":attraction", $attraction, PDO::PARAM_STR);
        $stmt->bindParam(":review", $review, PDO::PARAM_STR);
        $stmt->bindParam(":rating", $rating, PDO::PARAM_INT);
        $stmt->execute();
    }
    unset($stmt);
}

unset($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Destination Reviews</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #ffe6f2; /* Romantic background color */
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        .review-form {
            margin-bottom: 40px;
        }
        textarea {
            width: 100%;
            height: 120px;
        }
        input, textarea {
            margin-top: 10px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background: #ff99cc; /* Romantic button color */
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #ff80bf;
        }
        .review {
            background: #fffef0;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .review p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Write a Review for Your Favorite Travel Destination</h2>
        <form class="review-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="destination" placeholder="Destination" required>
            <input type="text" name="hotel" placeholder="Hotel (Optional)">
            <input type="text" name="attraction" placeholder="Attraction (Optional)">
            <textarea name="review" placeholder="Share your experience" required></textarea>
            <input type="number" name="rating" placeholder="Rating (1-5)" required min="1" max="5">
            <input type="submit" name="submit" value="Submit Review">
        </form>
        <h2>Travel Reviews</h2>
        <?php
        try {
            $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT destination, hotel, attraction, review, rating FROM reviews ORDER BY created_at DESC";
            if($stmt = $pdo->prepare($sql)){
                if($stmt->execute()){
                    if($stmt->rowCount() > 0){
                        while($row = $stmt->fetch()){
                            echo "<div class='review'>";
                            echo "<h3>" . htmlspecialchars($row['destination']) . "</h3>";
                            echo "<p>Hotel: " . ($row['hotel'] ? htmlspecialchars($row['hotel']) : "N/A") . "</p>";
                            echo "<p>Attraction: " . ($row['attraction'] ? htmlspecialchars($row['attraction']) : "N/A") . "</p>";
                            echo "<p>Review: " . htmlspecialchars($row['review']) . "</p>";
                            echo "<p>Rating: " . htmlspecialchars($row['rating']) . "</p>";
                            echo "</div>";
                        }
                    } else{
                        echo "<p>No reviews yet. Be the first to write one!</p>";
                    }
                }
            }
            unset($stmt);
        } catch(PDOException $e){
            die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        }
        unset($pdo);
        ?>
    </div>
</body>
</html>
