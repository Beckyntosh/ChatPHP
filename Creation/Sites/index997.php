<?php
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Connect to database
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS provider_ratings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    provider_name VARCHAR(50) NOT NULL,
    rating INT NOT NULL,
    review TEXT NOT NULL,
    reg_date TIMESTAMP
)";
$conn->query($tableSql);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $providerName = $_POST["provider_name"];
    $rating = $_POST["rating"];
    $review = $_POST["review"];

    $stmt = $conn->prepare("INSERT INTO provider_ratings (provider_name, rating, review) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $providerName, $rating, $review);
    $stmt->execute();
    echo "<p>Review submitted successfully!</p>";
}

// Retrieve all ratings
$result = $conn->query("SELECT provider_name, rating, review FROM provider_ratings");

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Healthcare Provider Ratings</title>
</head>
<body>
<h2>Rate and Review Healthcare Providers</h2>
<form method="post">
    Provider Name: <input type="text" name="provider_name" required><br>
    Rating: <input type="number" name="rating" min="1" max="5" required><br>
    Review: <textarea name="review" required></textarea><br>
    <input type="submit" value="Submit">
</form>

<h3>Ratings and Reviews:</h3>
<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p>Provider: " . $row["provider_name"]. " - Rating: " . $row["rating"]. " - Review: " . $row["review"]. "</p>";
    }
} else {
    echo "<p>No reviews yet</p>";
}
?>
</body>
</html>
