<?php
// DB connection info
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create review table if it does not exist
try {
    $sql = "CREATE TABLE IF NOT EXISTS reviews (
        id INT AUTO_INCREMENT PRIMARY KEY,
        destination VARCHAR(255),
        review TEXT,
        rating INT,
        date_posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    $pdo->exec($sql);
} catch (PDOException $e) {
    die("ERROR: Could not create table. " . $e->getMessage());
}

// Handling form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $destination = $_POST['destination'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];

    $sql = "INSERT INTO reviews (destination, review, rating) VALUES (:destination, :review, :rating)";

    if ($stmt = $pdo->prepare($sql)) {
        $stmt->bindParam(':destination', $destination, PDO::PARAM_STR);
        $stmt->bindParam(':review', $review, PDO::PARAM_STR);
        $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script>alert('Review added successfully!');</script>";
        } else {
            echo "<script>alert('Oops! Something went wrong. Please try again later.');</script>";
        }

        unset($stmt);
    }
}

// Fetching all reviews
try {
    $sql = "SELECT * FROM reviews ORDER BY date_posted DESC";
    $result = $pdo->query($sql);
    $reviews = $result->fetchAll();
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
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
            background-color: #f0f8ff;
            margin: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type=text],
        textarea,
        select {
            margin: 10px 0;
            padding: 10px;
        }

        input[type=submit] {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type=submit]:hover {
            opacity: 0.8;
        }

        .review {
            background-color: #f2f2f2;
            padding: 20px;
            margin-bottom: 20px;
        }

        .review h3,
        .review p {
            margin: 0 0 10px;
        }

        .review time {
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Share Your Travel Experience</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="destination">Destination:</label>
            <input type="text" id="destination" name="destination" required>
            <label for="review">Review:</label>
            <textarea id="review" name="review" rows="5" required></textarea>
            <label for="rating">Rating:</label>
            <select id="rating" name="rating">
                <option value="1">1 - Poor</option>
                <option value="2">2 - Fair</option>
                <option value="3">3 - Good</option>
                <option value="4">4 - Very good</option>
                <option value="5">5 - Excellent</option>
            </select>
            <input type="submit" name="submit" value="Submit Review">
        </form>
        <h2>Latest Reviews</h2>
        <?php foreach ($reviews as $review) : ?>
            <div class="review">
                <h3><?= htmlspecialchars($review['destination']); ?></h3>
                <p><?= htmlspecialchars($review['review']); ?></p>
                <p>Rating: <?= $review['rating']; ?>/5</p>
                <time><?= date('F d, Y', strtotime($review['date_posted'])); ?></time>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>
