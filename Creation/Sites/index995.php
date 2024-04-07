<?php
// Establish a connection to the database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create tables if they do not exist
$reviewsTable = "CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(50) NOT NULL,
rating INT NOT NULL,
review VARCHAR(255),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$usersTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(32) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($reviewsTable) === TRUE && $conn->query($usersTable) === TRUE) {
    // Tables created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle review form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitReview'])) {
    $destination = htmlspecialchars($_POST['destination']);
    $rating = (int)$_POST['rating'];
    $review = htmlspecialchars($_POST['review']);

    $stmt = $conn->prepare("INSERT INTO reviews (destination, rating, review) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $destination, $rating, $review);

    if ($stmt->execute()) {
        echo "<script>alert('Review submitted successfully!');</script>";
    } else {
        echo "<script>alert('Error submitting review.');</script>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Destinations Reviews</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #222; color: #fff; }
        .container { width: 80%; margin: auto; overflow: hidden; }
        header { background: #333; color: #fff; padding-top: 30px; min-height: 70px; border-bottom: #0779e4 3px solid; }
        header a { color: #fff; text-decoration: none; text-transform: uppercase; font-size: 16px; }
        form { margin-top: 20px; padding: 20px; }
        input[type="text"], input[type="password"], textarea { width: 100%; margin-bottom: 20px; padding: 10px; }
        input[type="submit"] { display: block; width: 100%; }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Travel Destination Reviews</h1>
        </div>
    </header>
    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="destination">Destination:</label><br>
            <input type="text" id="destination" name="destination" required><br>
            <label for="rating">Rating:</label><br>
            <input type="number" id="rating" name="rating" min="1" max="5" required><br>
            <label for="review">Review:</label><br>
            <textarea id="review" name="review" rows="4"></textarea><br>
            <input type="submit" name="submitReview" value="Submit Review">
        </form>
    </div>
</body>
</html>
