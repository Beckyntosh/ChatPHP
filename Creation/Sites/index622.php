<?php

// Database connection details
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

// Creating the review table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS reviews (
id INT AUTO_INCREMENT PRIMARY KEY,
product_id INT,
user_id INT,
rating INT,
comment TEXT,
FOREIGN KEY (product_id) REFERENCES products(id),
FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Review table created successfully or already exists.";
} else {
    echo "Error creating review table: " . $conn->error;
}

// Handling the submission of the review
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_review'])) {
    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO reviews (product_id, user_id, rating, comment) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("iiis", $product_id, $user_id, $rating, $comment);
        $stmt->execute();

        echo "<p>Review submitted successfully!</p>";
    } else {
        echo "<p>Error submitting review: " . $conn->error . "</p>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Bedding Music Streaming Service - Product Review</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #4CAF50;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group input[type="submit"] {
            background: #4CAF50;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Submit Your Review</h2>
    <form method="POST">
        <div class="form-group">
            <label for="product_id">Product ID:</label>
            <input type="number" id="product_id" name="product_id" required>
        </div>

        <div class="form-group">
            <label for="user_id">User ID:</label>
            <input type="number" id="user_id" name="user_id" required>
        </div>

        <div class="form-group">
            <label for="rating">Rating:</label>
            <select id="rating" name="rating" required>
                <option value="1">1 - Poor</option>
                <option value="2">2 - Fair</option>
                <option value="3">3 - Good</option>
                <option value="4">4 - Very Good</option>
                <option value="5">5 - Excellent</option>
            </select>
        </div>

        <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" required></textarea>
        </div>

        <div class="form-group">
            <input type="submit" name="submit_review" value="Submit Review">
        </div>
    </form>
</div>

</body>
</html>