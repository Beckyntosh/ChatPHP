
<?php
// Database connection
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
$createTablesSql = "
CREATE TABLE IF NOT EXISTS Games (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  description TEXT,
  release_date DATE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  game_id INT(6) UNSIGNED,
  user VARCHAR(50),
  rating INT(1),
  review TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (game_id) REFERENCES Games(id)
);";

if (!$conn->multi_query($createTablesSql)) {
  echo "Error creating tables: " . $conn->error;
}
$conn->close();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $game_id = htmlspecialchars($_POST['game_id']);
    $user = htmlspecialchars($_POST['user']);
    $rating = htmlspecialchars($_POST['rating']);
    $review = htmlspecialchars($_POST['review']);
    
    // Insert review into database
    $conn = new mysqli($servername, $username, $password, $dbname);
    $stmt = $conn->prepare("INSERT INTO Reviews (game_id, user, rating, review) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isis", $game_id, $user, $rating, $review);
    $stmt->execute();
    
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Video Game Reviews</title>
    <style>
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        
        input[type="text"], textarea, select {
            width: 100%;
            margin: 5px 0;
            padding: 10px;
        }
        
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        
        .reviews {
            margin-top: 20px;
        }
        
        .review {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Submit Your Game Review</h1>
    <form action="" method="post">
        <label for="game_id">Game:</label>
        <select name="game_id" id="game_id">
Dynamically populate from database
            <?php
            $conn = new mysqli($servername, $username, $password, $dbname);
            $sql = "SELECT id, name FROM Games";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='". $row["id"] ."'>". $row["name"] ."</option>";
                }
            }
            $conn->close();
            ?>
        </select>
        <input type="text" name="user" placeholder="Your name" required>
        <input type="text" name="rating" placeholder="Rating (1-5)" required>
        <textarea name="review" placeholder="Your review here..." required></textarea>
        <input type="submit" value="Submit Review">
    </form>
    
    <div class="reviews">
        <h2>Recent Reviews</h2>
        <?php
        // Fetch and display reviews
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "SELECT Games.name AS game_name, Reviews.user, Reviews.rating, Reviews.review FROM Reviews JOIN Games ON Reviews.game_id = Games.id ORDER BY Reviews.created_at DESC";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='review'><strong>Game:</strong> " . $row["game_name"]. " - <strong>By:</strong> " . $row["user"]. " - <strong>Rating:</strong> " . $row["rating"]. "<br>" . $row["review"]. "</div>";
            }
        } else {
            echo "No reviews yet.";
        }
        $conn->close();
        ?>
    </div>
</div>
</body>
</html>
