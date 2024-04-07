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

// Create tables if not exists
$createProvidersTable = "CREATE TABLE IF NOT EXISTS providers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  specialty VARCHAR(255) NOT NULL,
  location VARCHAR(255) NOT NULL
)";

$createRatingsTable = "CREATE TABLE IF NOT EXISTS ratings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  provider_id INT NOT NULL,
  rating INT NOT NULL,
  review TEXT,
  FOREIGN KEY(provider_id) REFERENCES providers(id)
)";

if (!$conn->query($createProvidersTable) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

if (!$conn->query($createRatingsTable) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Insert a new review
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['provider_id'])) {
  $provider_id = $_POST['provider_id'];
  $rating = $_POST['rating'];
  $review = $_POST['review'];

  $stmt = $conn->prepare("INSERT INTO ratings (provider_id, rating, review) VALUES (?, ?, ?)");
  $stmt->bind_param("iis", $provider_id, $rating, $review);

  if($stmt->execute()){
      echo "New record created successfully!";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Healthcare Provider Ratings</title>
</head>
<body>
<h2>Rate Your Healthcare Provider</h2>

<form action="" method="post">
    <label for="provider_id">Provider:</label>
    <select id="provider_id" name="provider_id">
        <?php
        $sql = "SELECT id, name FROM providers";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
          }
        } else {
          echo "<option value=''>No providers available</option>";
        }
        ?>
    </select>
    <br>
    <label for="rating">Rating (1-5):</label>
    <input type="number" id="rating" name="rating" min="1" max="5" required>
    <br>
    <label for="review">Review:</label>
    <textarea id="review" name="review" rows="4" cols="50"></textarea>
    <br>
    <input type="submit" value="Submit Review">
</form>

<h2>Provider Ratings</h2>
<?php
$sql = "SELECT providers.name, ratings.rating, ratings.review FROM ratings INNER JOIN providers ON ratings.provider_id = providers.id ORDER BY rating DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<p><strong>" . $row["name"]. "</strong> - Rating: " . $row["rating"]. " - Review: " . $row["review"]. "</p>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
</body>
</html>
