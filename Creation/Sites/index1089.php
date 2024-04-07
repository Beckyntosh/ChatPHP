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

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS properties (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(50) NOT NULL,
address VARCHAR(100) NOT NULL,
description TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
property_id INT(6) UNSIGNED,
content TEXT,
rating INT(1),
author VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
FOREIGN KEY (property_id) REFERENCES properties(id)
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

//Handle Post request for new review
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_review'])) {
    $property_id = $_POST['property_id'];
    $author = $_POST['author'];
    $content = $_POST['content'];
    $rating = $_POST['rating'];

    $stmt = $conn->prepare("INSERT INTO reviews (property_id, author, content, rating) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("issi", $property_id, $author, $content, $rating);

    if ($stmt->execute()) {
        echo "<p>Review submitted successfully!</p>";
    } else {
        echo "<p>Failed to submit review: " . $conn->error . "</p>";
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Property Reviews</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .property { margin-bottom: 40px; }
        .property-title { font-size: 24px; }
        .review { background-color: #f0f0f0; margin: 10px 0; padding: 10px; }
    </style>
</head>
<body>
<h1>Real Estate Property Reviews</h1>

<?php
$query = "SELECT * FROM properties";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='property'>";
        echo "<div class='property-title'>" . $row["title"] . "</div>";
        echo "<div>" . $row["address"] . "</div>";
        echo "<p>" . $row["description"] . "</p>";

        // Get reviews for property
        $reviewsQuery = "SELECT * FROM reviews WHERE property_id=" . $row["id"];
        $reviewsResult = $conn->query($reviewsQuery);

        echo "<h4>Reviews</h4>";
        if ($reviewsResult->num_rows > 0) {
            while($review = $reviewsResult->fetch_assoc()) {
                echo "<div class='review'><p>Rating: " . $review["rating"] . "/5</p><p>" . $review["content"] . "</p><p>- " . $review["author"] . "</p></div>";
            }
        } else {
            echo "<p>No reviews yet.</p>";
        }

        // Simple form for submitting a review for this property
        echo "<form action='' method='post'>";
        echo "<input type='hidden' name='property_id' value='".$row["id"]."'>";
        echo "<input type='text' name='author' placeholder='Your Name' required>";
        echo "<textarea name='content' placeholder='Write a review...' required></textarea>";
        echo "<select name='rating' required>";
        echo "<option value=''>Rating</option>";
        for ($i = 1; $i <= 5; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        echo "</select>";
        echo "<button type='submit' name='submit_review'>Submit Review</button>";
        echo "</form>";

        echo "</div>";
    }
} else {
    echo "0 Properties found";
}
?>

</body>
</html>

<?php
$conn->close();
?>
