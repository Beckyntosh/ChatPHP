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

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS TravelReviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
review TEXT NOT NULL,
rating INT NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST["destination"];
    $review = $_POST["review"];
    $rating = $_POST["rating"];

    $stmt = $conn->prepare("INSERT INTO TravelReviews (destination, review, rating) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $destination, $review, $rating);
  
    if (!$stmt->execute()) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Travel Destination Reviews</title>
</head>
<body>

<h1>Share Your Travel Experiences</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Destination: <input type="text" name="destination"><br>
  Review: <textarea name="review"></textarea><br>
  Rating (1-5): <input type type="number" name="rating" min="1" max="5"><br>
  <input type="submit" value="Submit">
</form>

<h2>Recent Reviews</h2>
<?php
$sql = "SELECT destination, review, rating, reg_date FROM TravelReviews ORDER BY reg_date DESC LIMIT 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<b>Destination:</b> " . $row["destination"]. " - <b>Review:</b> " . $row["review"]. " <b>Rating:</b> " . $row["rating"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

</body>
</html>
