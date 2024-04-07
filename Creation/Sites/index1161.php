<?php
// Define MySQL connection parameters
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
$sql = "CREATE TABLE IF NOT EXISTS restaurants (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  location VARCHAR(255),
  description TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql)) {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS reviews (
  id INT AUTO_INCREMENT PRIMARY KEY,
  restaurant_id INT,
  user_name VARCHAR(255),
  rating INT,
  review TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (restaurant_id) REFERENCES restaurants(id)
)";

if (!$conn->query($sql)) {
  echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $restaurant_id = $_POST['restaurant_id'];
  $user_name = $_POST['user_name'];
  $rating = $_POST['rating'];
  $review = $_POST['review'];

  $stmt = $conn->prepare("INSERT INTO reviews (restaurant_id, user_name, rating, review) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("isis", $restaurant_id, $user_name, $rating, $review);

  if ($stmt->execute()) {
    echo "New review added successfully";
  } else {
    echo "Error: " . $stmt->error;
  }
  $stmt->close();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Restaurant Reviews</title>
</head>
<body>
<h1>Restaurant Reviews</h1>
<form method="POST">
    <label for="restaurant_id">Select Restaurant:</label>
    <select name="restaurant_id" required>
        <?php
        $result = $conn->query("SELECT id, name FROM restaurants");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
        }
        ?>
    </select>
    <label for="user_name">Name:</label>
    <input type="text" id="user_name" name="user_name" required>
    <label for="rating">Rating:</label>
    <input type="number" id="rating" name="rating" min="1" max="5" required>
    <label for="review">Review:</label>
    <textarea id="review" name="review" required></textarea>
    <input type="submit" value="Submit">
</form>

<h2>Reviews</h2>
<?php
$result = $conn->query("SELECT r.name, v.user_name, v.rating, v.review FROM reviews v JOIN restaurants r ON v.restaurant_id = r.id ORDER BY v.created_at DESC");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>" . $row["name"] . "</strong> by " . $row["user_name"] . " - Rating: " . $row["rating"] . "/5" . "<br>" . $row["review"] . "</p>";
    }
} else {
    echo "No reviews yet.";
}
$conn->close();
?>
</body>
</html>
