<?php
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

// Create table for reviews if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS app_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    review TEXT NOT NULL,
    rating INT(1),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($createTable) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $review = $_POST["review"];
    $rating = $_POST["rating"];

    $sql = "INSERT INTO app_reviews (username, review, rating) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $username, $review, $rating);

    if($stmt->execute()) {
        echo "New review added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>App Review System</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .review-form { margin-top: 20px; }
        .review-form textarea { width: 100%; margin-bottom: 10px; }
        .review-form input[type=text], .review-form input[type=number] { width: 100%; margin-bottom: 10px; }
    </style>
</head>
<body>
    <h1>Share Your Review!</h1>

    <form class="review-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Name:</label>
        <input type="text" name="username" required>

        <label for="review">Review:</label>
        <textarea name="review" required></textarea>

        <label for="rating">Rating:</label>
        <input type="number" name="rating" min="1" max="5" required>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
