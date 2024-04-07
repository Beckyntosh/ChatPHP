<?php
// Simple travel review web application in a single file. This code includes basic functionalities to add travel reviews.

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

// Create tables if they do not exist
$createTables = "CREATE TABLE IF NOT EXISTS destinations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    location VARCHAR(30) NOT NULL,
    description TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination_id INT(6) UNSIGNED,
    title VARCHAR(50),
    review TEXT,
    rating INT(1),
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (destination_id) REFERENCES destinations(id)
    );";

if ($conn->multi_query($createTables) === TRUE) {
  echo "Tables created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();

// Function to add review
function addReview($destination_id, $title, $review, $rating) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO reviews (destination_id, title, review, rating) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("issi", $destination_id, $title, $review, $rating);
    $stmt->execute();
    echo "New record created successfully";
    $stmt->close();
}

// Handle form submission
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_review"])) {
    $destination_id = $_POST["destination_id"];
    $title = $_POST["title"];
    $review = $_POST["review"];
    $rating = $_POST["rating"];
    addReview($destination_id, $title, $review, $rating);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Destination Reviews</title>
    <style>
        body{ font-family: Arial, sans-serif; }
        .review-form, .reviews { margin: 20px auto; width: 90%; max-width: 600px; }
        .review-form textarea { width: 100%; }
    </style>
</head>
<body>

<div class="review-form">
    <h2>Add your review</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="destination_id">Destination ID:</label>
        <input type="number" id="destination_id" name="destination_id" required><br><br>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>
        <label for="review">Review:</label>
        <textarea id="review" name="review" required></textarea><br><br>
        <label for="rating">Rating:</label>
        <select id="rating" name="rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br><br>
        <input type="submit" name="submit_review" value="Submit Review">
    </form>
</div>

</body>
</html>
