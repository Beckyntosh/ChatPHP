<?php
// Connection parameters
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", 'root');
define("MYSQL_DATABASE", "my_database");
define("MYSQL_HOST", "db");

// Create connection
$conn = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$createTables = "
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    image_url VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    user_name VARCHAR(255),
    rating INT CHECK(rating >= 1 AND rating <= 5),
    review_text TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products (id) ON DELETE CASCADE
);
";

if ($conn->multi_query($createTables)) {
    do {
        if ($res = $conn->store_result()) {
            $res->free();
        }
    } while ($conn->more_results() && $conn->next_result());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $user_name = $_POST['user_name'];
    $rating = $_POST['rating'];
    $review_text = $_POST['review_text'];

    $stmt = $conn->prepare("INSERT INTO reviews (product_id, user_name, rating, review_text) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isis", $product_id, $user_name, $rating, $review_text);

    if ($stmt->execute()) {
        echo "<script>alert('Review submitted successfully');</script>";
    } else {
        echo "<script>alert('Error submitting review');</script>";
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Baby Products Gadget Reviews</title>
<style>
  body { font-family: Arial, sans-serif; }
  .product { margin-bottom: 20px; padding: 10px; border: 1px solid #ddd; }
  .review { margin-bottom: 10px; padding: 5px; border-left: 3px solid #f90; }
</style>
</head>
<body>

<h1>Baby Products Reviews</h1>

<?php
// Display products
$productsResult = $conn->query("SELECT id, name, description, image_url FROM products");
while($product = $productsResult->fetch_assoc()) {
    echo "<div class='product'><h2>". htmlentities($product['name'])."</h2>";
    echo "<p>". htmlentities($product['description']). "</p>";
    echo "<p><img src='". htmlentities($product['image_url']). "' alt='". htmlentities($product['name']). "' style='width:200px;'></p>";
    
    // Display reviews
    $reviewsResult = $conn->prepare("SELECT user_name, rating, review_text, created_at FROM reviews WHERE product_id = ?");
    $reviewsResult->bind_param("i", $product['id']);
    $reviewsResult->execute();
    $result = $reviewsResult->get_result();

    echo "<h3>Reviews</h3>";
    if ($result->num_rows > 0) {
        while($review = $result->fetch_assoc()) {
            echo "<div class='review'><strong>". htmlentities($review['user_name']). ":</strong> Rating: ". htmlentities($review['rating'])."/5";
            echo "<p>". htmlentities($review['review_text'])."</p></div>";
        }
    } else {
        echo "<p>No reviews yet.</p>";
    }
    
    // Review form
    echo "<h3>Leave a review</h3>";
    echo "<form action='' method='post'>";
    echo "<input type='hidden' name='product_id' value='". $product['id']."'>";
    echo "<p><input type='text' name='user_name' required placeholder='Your Name'></p>";
    echo "<p><input type='number' name='rating' required min='1' max='5' placeholder='Rating (1-5)'></p>";
    echo "<p><textarea name='review_text' required placeholder='Your review here...'></textarea></p>";
    echo "<p><input type='submit' value='Submit Review'></p>";
    echo "</form>";

    echo "</div>";
}
?>

</body>
</html>

<?php
$conn->close();
?>
