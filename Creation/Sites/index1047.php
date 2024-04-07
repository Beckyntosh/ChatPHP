<?php
// DB Connection
define("MYSQL_ROOT_PSWD", "root");
$servername = "db";
$database = "my_database";
$username = "root";
$password = MYSQL_ROOT_PSWD;

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$createTableSql = "CREATE TABLE IF NOT EXISTS book_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    review TEXT NOT NULL,
    rating INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTableSql)) {
    die("Error creating table: " . $conn->error);
}

// Handle book review submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $book_title = $conn->real_escape_string($_POST['book_title']);
    $author = $conn->real_escape_string($_POST['author']);
    $review = $conn->real_escape_string($_POST['review']);
    $rating = intval($_POST['rating']);

    $insertSql = "INSERT INTO book_reviews (book_title, author, review, rating) VALUES ('$book_title', '$author', '$review', $rating)";
    
    if (!$conn->query($insertSql)) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Review and Recommendation Engine</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #333;
            color: #fff;
        }
        .container {
            width: 80%;
            margin: auto;
            background-color: #222;
            padding: 20px;
            border-radius: 8px;
        }
        .review-form {
            margin-bottom: 40px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        .review {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #444;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Book Review Submitter</h2>
        <form class="review-form" action="" method="post">
            <input type="text" name="book_title" placeholder="Book Title" required>
            <input type="text" name="author" placeholder="Author" required>
            <textarea name="review" placeholder="Review" rows="4" required></textarea>
            <input type="number" name="rating" placeholder="Rating (1-5)" min="1" max="5" required>
            <input type="submit" name="submit" value="Submit Review">
        </form>

        <h2>Book Reviews</h2>
        <?php
        $sql = "SELECT book_title, author, review, rating, created_at FROM book_reviews ORDER BY created_at DESC";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class=\"review\">";
                echo "<h3>" . htmlspecialchars($row["book_title"]) . " by " . htmlspecialchars($row["author"]) . "</h3>";
                echo "<p>" . nl2br(htmlspecialchars($row["review"])) . "</p>";
                echo "<p>Rating: " . htmlspecialchars($row["rating"]) . "/5</p>";
                echo "<p><small>Reviewed on: " . $row["created_at"] . "</small></p>";
                echo "</div>";
            }
        } else {
            echo "No reviews yet. Be the first to review!";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
