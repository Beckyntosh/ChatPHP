<?php
// Initialize the connection parameters
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

// Attempt to create the table if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    review TEXT NOT NULL,
    rating INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($table_sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handler for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST['destination'];
    $author = $_POST['author'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];

    $insert_sql = "INSERT INTO reviews (destination, author, review, rating) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("sssi", $destination, $author, $review, $rating);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insert_sql . "<br>" . $conn->error;
    }
    $stmt->close();
}

// Fetch all reviews
$fetch_sql = "SELECT destination, author, review, rating FROM reviews ORDER BY created_at DESC";
$result = $conn->query($fetch_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Destination Reviews</title>
</head>
<body>

<h2>Share Your Travel Experience</h2>
<form method="POST">
    <label for="destination">Destination:</label><br>
    <input type="text" id="destination" name="destination" required><br>
    <label for="author">Name:</label><br>
    <input type="text" id="author" name="author" required><br>
    <label for="review">Review:</label><br>
    <textarea id="review" name="review" required></textarea><br>
    <label for="rating">Rating:</label><br>
    <select id="rating" name="rating" required>
        <option value="1">1 - Poor</option>
        <option value="2">2 - Fair</option>
        <option value="3">3 - Good</option>
        <option value="4">4 - Very Good</option>
        <option value="5">5 - Excellent</option>
    </select><br><br>

    <input type="submit" value="Submit">
</form>

<h3>Travel Experiences</h3>
<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div><h4>" . htmlspecialchars($row["destination"]) . "</h4><p>By " . htmlspecialchars($row["author"]) . "</p><p>Rating: " . htmlspecialchars($row["rating"]) . "</p><p>" . htmlspecialchars($row["review"]) . "</p></div>";
    }
} else {
    echo "<p>No reviews yet. Be the first to share your experience!</p>";
}
$conn->close();
?>
</body>
</html>
