<?php
// Database connection parameters
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

// Create the required table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_name VARCHAR(50) NOT NULL,
user_name VARCHAR(50),
rating INT(10),
review TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Insert a new review
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $user_name = $_POST['user_name'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    $stmt = $conn->prepare("INSERT INTO reviews (product_name, user_name, rating, review) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $product_name, $user_name, $rating, $review);
    $stmt->execute();
    $stmt->close();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Review and Rating Feature</title>
    <style>
        .container {
            width: 50%;
            margin: 100px auto;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input, textarea {
            margin: 10px 0;
            padding: 8px;
        }
        button {
            padding: 10px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Leave a Review for a Musical Instrument</h2>
    <form action="" method="post">
        <input type="text" name="product_name" placeholder="Product Name" required>
        <input type="text" name="user_name" placeholder="Your Name" required>
        <input type="number" name="rating" placeholder="Rating (1-5)" min="1" max="5" required>
        <textarea name="review" placeholder="Write your review here..." rows="4" required></textarea>
        <button type="submit">Submit Review</button>
    </form>
</div>

<div class="container">
    <h2>Reviews</h2>
    <?php
    $sql = "SELECT product_name, user_name, rating, review, reg_date FROM reviews ORDER BY reg_date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div><strong>" . $row["product_name"]. "</strong> by " . $row["user_name"]. "<br>Rating: " . $row["rating"]. "/5<br>" . $row["review"]. "<br><small>Posted on " . $row["reg_date"]. "</small></div><hr>";
        }
    } else {
        echo "0 reviews";
    }
    ?>
</div>

</body>
</html>
<?php
$conn->close();
?>
