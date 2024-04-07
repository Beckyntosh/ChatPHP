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

// Create products table if it does not exist
$createProductsTable = "CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  description TEXT NOT NULL,
  reg_date TIMESTAMP
)";

if (!$conn->query($createProductsTable)) {
  echo "Error creating products table: " . $conn->error;
}

// Create reviews table if it does not exist
$createReviewsTable = "CREATE TABLE IF NOT EXISTS reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_id INT(6) UNSIGNED NOT NULL,
  rating INT(1) NOT NULL,
  comment TEXT NOT NULL,
  reg_date TIMESTAMP,
  FOREIGN KEY (product_id) REFERENCES products(id)
)";

if (!$conn->query($createReviewsTable)) {
  echo "Error creating reviews table: " . $conn->error;
}

// Function to insert a new review
function addReview($product_id, $rating, $comment, $conn) {
    $stmt = $conn->prepare("INSERT INTO reviews (product_id, rating, comment) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $product_id, $rating, $comment);

    if($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    $stmt->close();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    addReview($product_id, $rating, $comment, $conn);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Review and Rating System</title>
    <style type="text/css">
    /* Simple CSS for form */
    body { font-family: Arial, sans-serif; }
    .review-form { margin: 20px 0; }
    </style>
</head>
<body>

<h2>Product Reviews Form</h2>

<form class="review-form" action="" method="post">
    Product ID: <br><input type="number" name="product_id" required><br>
    Rating: <br><input type="number" name="rating" min="1" max="5" required><br>
    Comment: <br><textarea name="comment" rows="4" required></textarea><br>
    <input type="submit" value="Submit Review">
</form>

</body>
</html>

<?php
$conn->close();
?>
