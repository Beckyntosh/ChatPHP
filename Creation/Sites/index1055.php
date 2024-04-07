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

// Create table for courses if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
description TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Create table for ratings if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS ratings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
course_id INT(6) UNSIGNED,
rating INT(1),
comment TEXT,
FOREIGN KEY (course_id) REFERENCES courses(id)
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle the rating form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitRating"])) {
  $course_id = $_POST["course_id"];
  $rating = $_POST["rating"];
  $comment = $_POST["comment"];

  $sql = "INSERT INTO ratings (course_id, rating, comment) VALUES (?, ?, ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("iis", $course_id, $rating, $comment);
  $stmt->execute();
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Course Rating System</title>
</head>
<body>

<h2>Rate a Course</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="course_id">Course:</label>
  <select name="course_id" id="course_id">
    <?php
    $sql = "SELECT id, name FROM courses";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
      }
    } else {
      echo "0 results";
    }
    ?>
  </select><br>
  
  <label for="rating">Rating:</label>
  <select name="rating" id="rating">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select><br>
  
  <label for="comment">Comment:</label><br>
  <textarea name="comment" id="comment" rows="4" cols="50"></textarea><br>
  
  <input type="submit" name="submitRating" value="Submit">
</form>

<h2>Course Ratings</h2>
<?php
$sql = "SELECT courses.name, ratings.rating, ratings.comment FROM ratings JOIN courses ON courses.id = ratings.course_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<p><strong>" . $row["name"]. " - " . $row["rating"]. "/5</strong><br>" . $row["comment"]. "</p>";
  }
} else {
  echo "0 ratings";
}
$conn->close();
?>

</body>
</html>
