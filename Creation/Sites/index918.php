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

// Handle POST request to add a review
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitReview'])) {
    $product_id = $_POST['product_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $stmt = $conn->prepare("INSERT INTO reviews (product_id, rating, comment) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $product_id, $rating, $comment);

    if ($stmt->execute()) {
        echo "<script>alert('Review added successfully!');</script>";
    } else {
        echo "<script>alert('Error adding review.');</script>";
    }

    $stmt->close();
}

// Fetch all products
$productsSql = "SELECT * FROM products";
$productsResult = $conn->query($productsSql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makeup Webshop</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f8ff; color: #333; }
        .product { margin-bottom: 40px; }
        .reviews { margin-top: 20px; }
        .review { background-color: #e0ffff; padding: 10px; margin-top: 10px; }
    </style>
</head>
<body>

<h1>Our Makeup Products</h1>

<?php while ($product = $productsResult->fetch_assoc()): ?>
    <div class="product">
        <h2><?= htmlspecialchars($product['name']) ?></h2>
        <p><?= htmlspecialchars($product['description']) ?></p>
        <form method="post">
            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
            <label for="rating">Rating:</label>
            <select name="rating" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <label for="comment">Comment:</label>
            <textarea name="comment" required></textarea>
            <button type="submit" name="submitReview">Submit Review</button>
        </form>
        <div class="reviews">
            <?php
            $reviewsSql = "SELECT * FROM reviews WHERE product_id = " . $product['id'];
            $reviewsResult = $conn->query($reviewsSql);
            while ($review = $reviewsResult->fetch_assoc()): ?>
                <div class="review">
                    <p>Rating: <?= $review['rating'] ?></p>
                    <p><?= htmlspecialchars($review['comment']) ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endwhile; ?>

</body>
</html>

<?php $conn->close(); ?>
