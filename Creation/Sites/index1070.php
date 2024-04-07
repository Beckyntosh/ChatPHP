<?php

// Database configuration
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

// Create table if it doesn't exist
$createTableSql = "CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(255) NOT NULL,
    review TEXT NOT NULL,
    rating INT(1) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTableSql)) {
    die("Error creating table: " . $conn->error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['destination']) && isset($_POST['review']) && isset($_POST['rating'])) {
    $destination = $_POST['destination'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];
    
    $stmt = $conn->prepare("INSERT INTO reviews (destination, review, rating) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $destination, $review, $rating);
    
    if ($stmt->execute()) {
        echo "<p>Review successfully added!</p>";
    } else {
        echo "<p>Error adding review: " . $conn->error . "</p>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Destination Reviews</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: 0 auto; }
        form { margin-bottom: 20px; }
        input[type="text"], textarea, select { width: 100%; margin: 5px 0; }
        input[type="submit"] { background-color: #4CAF50; color: white; padding: 10px; border: none; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
        .reviews { margin-top: 20px; }
        .review { border-bottom: 1px solid #eee; padding: 10px; }
        .rating { font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h1>Travel Destination Reviews</h1>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination" required>
        
        <label for="review">Review:</label>
        <textarea id="review" name="review" required></textarea>
        
        <label for="rating">Rating:</label>
        <select name="rating" id="rating" required>
            <option value="1">1 - Poor</option>
            <option value="2">2 - Fair</option>
            <option value="3">3 - Good</option>
            <option value="4">4 - Very Good</option>
            <option value="5">5 - Excellent</option>
        </select>
        
        <input type="submit" value="Submit Review">
    </form>

    <div class="reviews">
        <?php
        // Display reviews
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "SELECT destination, review, rating FROM reviews ORDER BY created_at DESC";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='review'><p class='destination'><strong>" . htmlspecialchars($row["destination"]) . "</strong></p>";
                echo "<p>" . nl2br(htmlspecialchars($row["review"])) . "</p>";
                echo "<p class='rating'>Rating: " . $row["rating"] . "/5</p></div>";
            }
        } else {
            echo "<p>No reviews yet. Be the first to add one!</p>";
        }
        $conn->close();
        ?>
    </div>
</div>

</body>
</html>
