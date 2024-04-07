<?php
// Handles connection to the MySQL database
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

// Create courses table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS courses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Create feedback table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS feedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    course_id INT(6) UNSIGNED,
    rating INT(1) NOT NULL,
    comment TEXT,
    submit_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(id)
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// When form is submitted, insert feedback into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST['course_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];
    
    $stmt = $conn->prepare("INSERT INTO feedback (course_id, rating, comment) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $course_id, $rating, $comment);
    
    if($stmt->execute()) {
        echo "<p>Feedback successfully submitted!</p>";
    } else {
        echo "<p>Error submitting feedback: " . $conn->error . "</p>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Online Course Feedback System</title>
</head>
<body>

<h2>Course Feedback Form</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="course_id">Course ID:</label><br>
  <input type="number" id="course_id" name="course_id" required><br>
  <label for="rating">Rating (1-5):</label><br>
  <input type="number" id="rating" name="rating" min="1" max="5" required><br>
  <label for="comment">Comment:</label><br>
  <textarea id="comment" name="comment" rows="4" cols="50"></textarea><br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>

<?php
$conn->close();
?>
