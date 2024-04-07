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

// Create the tables if they don't exist
$sql = "CREATE TABLE IF NOT EXISTS employees (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  reviewer_id INT(6) UNSIGNED,
  reviewee_id INT(6) UNSIGNED,
  rating INT(1),
  comments TEXT,
  review_date TIMESTAMP,
  FOREIGN KEY (reviewer_id) REFERENCES employees(id),
  FOREIGN KEY (reviewee_id) REFERENCES employees(id)
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle post request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reviewer_id = $_POST['reviewer_id'];
    $reviewee_id = $_POST['reviewee_id'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];

    $stmt = $conn->prepare("INSERT INTO reviews (reviewer_id, reviewee_id, rating, comments) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiis", $reviewer_id, $reviewee_id, $rating, $comments);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Employee Performance Review System</title>
</head>
<body>
<h2>Submit Performance Review</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="reviewer_id">Reviewer ID:</label><br>
  <input type="number" id="reviewer_id" name="reviewer_id" required><br>
  <label for="reviewee_id">Reviewee ID:</label><br>
  <input type="number" id="reviewee_id" name="reviewee_id" required><br>
  <label for="rating">Rating:</label><br>
  <input type="number" id="rating" name="rating" min="1" max="5" required><br>
  <label for="comments">Comments:</label><br>
  <textarea id="comments" name="comments" required></textarea><br><br>
  <input type="submit" value="Submit">
</form>
</body>
</html>
