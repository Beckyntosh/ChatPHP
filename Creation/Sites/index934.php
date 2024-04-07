
<?php
// Connection parameters
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

// Create table for destinations if it doesn't exist
$createDestinationsTable = "CREATE TABLE IF NOT EXISTS destinations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description TEXT,
    reg_date TIMESTAMP
    )";

if ($conn->query($createDestinationsTable) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Create table for reviews if it doesn't exist
$createReviewsTable = "CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination_id INT(6) UNSIGNED,
    author VARCHAR(30) NOT NULL,
    rating INT(1),
    content TEXT,
    reg_date TIMESTAMP,
    CONSTRAINT fk_destination
      FOREIGN KEY(destination_id) 
	  REFERENCES destinations(id)
    )";

if ($conn->query($createReviewsTable) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert a new review (example usage, should be replaced with dynamic data)
// Assuming we're receiving POST data from a form submission
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['destination']) && isset($_POST['author']) && isset($_POST['rating']) && isset($_POST['content'])) {
    $destination = $_POST['destination'];
    $author = $_POST['author'];
    $rating = $_POST['rating'];
    $content = $_POST['content'];

    $insertReview = $conn->prepare("INSERT INTO reviews (destination_id, author, rating, content) VALUES (?, ?, ?, ?)");
    $insertReview->bind_param("isis", $destination, $author, $rating, $content);
    
    if($insertReview->execute()) {
        echo "<script>alert('Review submitted successfully');</script>";
    } else {
        echo "<script>alert('Error submitting review');</script>";
    }

    $insertReview->close();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Travel Destination Reviews</title>
</head>
<body>
<h1>Submit Your Travel Review</h1>
<form action="" method="POST">
    Destination: <select name="destination">
    <?php
    $result = $conn->query("SELECT id, name FROM destinations");
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
        }
    } else {
        echo "<option>No destinations found</option>";
    }
    ?>
    </select><br /><br />
    Your Name: <input type="text" name="author" required><br /><br />
    Rating: <select name="rating">
      <option value="1">1 - Poor</option>
      <option value="2">2 - Fair</option>
      <option value="3">3 - Good</option>
      <option value="4">4 - Very Good</option>
      <option value="5">5 - Excellent</option>
    </select><br /><br />
    Review:<br />
    <textarea name="content" required></textarea><br /><br />
    <input type="submit" value="Submit Review">
</form>

<h2>Latest Reviews</h2>
<?php
$reviewsQuery = "SELECT destinations.name, reviews.author, reviews.rating, reviews.content FROM reviews JOIN destinations ON reviews.destination_id = destinations.id ORDER BY reviews.reg_date DESC LIMIT 10";
$result = $conn->query($reviewsQuery);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p><strong>Destination:</strong> " . $row["name"]. " | <strong>Author:</strong> " . $row["author"]. " | <strong>Rating:</strong> " . $row["rating"]. "/5" . "<br><strong>Review:</strong> " . $row["content"]. "</p>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</body>
</html>
