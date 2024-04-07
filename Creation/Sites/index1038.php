<?php
// Connection to the database
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

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS restaurants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
description TEXT,
reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
restaurant_id INT(6) UNSIGNED,
rating INT(1),
content TEXT,
reg_date TIMESTAMP,
FOREIGN KEY (restaurant_id) REFERENCES restaurants(id)
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["content"]) && isset($_POST["rating"])) {
    $restaurant_id = $conn->real_escape_string($_POST['restaurant_id']);
    $content = $conn->real_escape_string($_POST['content']);
    $rating = $conn->real_escape_string($_POST['rating']);

    $sql = "INSERT INTO reviews (restaurant_id, rating, content) VALUES ('$restaurant_id', '$rating', '$content')";

    if ($conn->query($sql) === TRUE) {
        echo "New review created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Restaurant Reviews</title>
<style>
    body { font-family: Arial, sans-serif; background-color: #222; color: #fff; }
    .container { max-width: 600px; margin: auto; padding: 20px; }
    .review { margin-bottom: 20px; padding: 10px; background-color: #333; }
    .rating { font-weight: bold; }
</style>
</head>
<body>
<div class="container">
<h1>Restaurant Reviews</h1>
<?php
$sql = "SELECT * FROM restaurants";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='restaurant'>";
        echo "<h2>" . $row["name"]. "</h2>";
        echo "<p>" . $row["description"]. "</p>";
        // Form for submitting reviews
        ?>
        <form action="" method="post">
        <input type="hidden" name="restaurant_id" value="<?= $row["id"] ?>">
        <label for="rating">Rating (1-5):</label>
        <input type="number" name="rating" min="1" max="5" required>
        <label for="content">Review:</label>
        <textarea name="content" required></textarea>
        <button type="submit">Submit Review</button>
        </form>
        <?php
        // Display reviews
        $restaurant_id = $row["id"];
        $sql_reviews = "SELECT * FROM reviews WHERE restaurant_id = '$restaurant_id'";
        $result_reviews = $conn->query($sql_reviews);

        if ($result_reviews->num_rows > 0) {
            while($review = $result_reviews->fetch_assoc()) {
                echo "<div class='review'><p class='rating'>Rating: " . $review['rating'] . "</p><p>" . $review['content'] . "</p></div>";
            }
        } else {
            echo "<p>No reviews yet.</p>";
        }
        echo "</div>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</div>
</body>
</html>
