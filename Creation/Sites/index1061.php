<?php
// Connection to database
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

// Create table for reviews if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS board_game_reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
game_name VARCHAR(50) NOT NULL,
user_name VARCHAR(50),
rating INT(1),
review TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Inserting a new review
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $game_name = $conn->real_escape_string($_POST['game_name']);
    $user_name = $conn->real_escape_string($_POST['user_name']);
    $rating = intval($_POST['rating']);
    $review = $conn->real_escape_string($_POST['review']);

    $insertSQL = "INSERT INTO board_game_reviews (game_name, user_name, rating, review) VALUES ('$game_name', '$user_name', $rating, '$review')";
    
    if ($conn->query($insertSQL) === TRUE) {
        echo "<script>alert('Review Added Successfully')</script>";
    } else {
        echo "<script>alert('Error: ". $conn->error ."')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Board Game Reviews</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<h2>Submit Your Review</h2>
<form action="" method="post">
    Game Name: <input type="text" name="game_name" required><br><br>
    Your Name: <input type="text" name="user_name" required><br><br>
    Rating: <select name="rating">
        <option value="1">1 - Poor</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4 - Good</option>
        <option value="5">5 - Excellent</option>
    </select><br><br>
    Review: <textarea name="review" required></textarea><br><br>
    <input type="submit" value="Submit Review">
</form>

<h2>Board Game Reviews</h2>
<?php
    $query = "SELECT * FROM board_game_reviews ORDER BY reg_date DESC";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div style='margin-bottom:20px;'>";
            echo "<p>Game: " . htmlspecialchars($row["game_name"]) . "</p>";
            echo "<p>User: " . htmlspecialchars($row["user_name"]) . "</p>";
            echo "<p>Rating: " . $row["rating"] . "</p>";
            echo "<p>Review: " . nl2br(htmlspecialchars($row["review"])) . "</p>";
            echo "</div>";
        }
    } else {
        echo "No reviews yet.";
    }
    $conn->close();
?>
</body>
</html>
