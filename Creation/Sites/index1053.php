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

// Create tables if they don't exist
$createCoursesTable = "CREATE TABLE IF NOT EXISTS courses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

$createRatingsTable = "CREATE TABLE IF NOT EXISTS ratings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    course_id INT(6) UNSIGNED,
    rating DECIMAL(2,1) NOT NULL,
    review TEXT,
    submit_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(id)
    )";

if ($conn->query($createCoursesTable) === TRUE && $conn->query($createRatingsTable) === TRUE) {
  // Tables created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST["course_id"];
    $rating = $_POST["rating"];
    $review = $_POST["review"];

    $stmt = $conn->prepare("INSERT INTO ratings (course_id, rating, review) VALUES (?, ?, ?)");
    $stmt->bind_param("ids", $course_id, $rating, $review);
    $stmt->execute();
    $stmt->close();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Course Rating System</title>
</head>
<body>
    <h1>Rate a Course</h1>
    <form method="post">
        <label for="course">Choose a course:</label>
        <select id="course" name="course_id">
            <?php
            $coursesQuery = "SELECT id, name FROM courses";
            $result = $conn->query($coursesQuery);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row["id"].">".$row["name"]."</option>";
                }
            } else {
                echo "<option>No courses available</option>";
            }
            ?>
        </select>
        <br>
        <label for="rating">Rating (1-5):</label>
        <input type="number" id="rating" name="rating" min="1" max="5" required>
        <br>
        <label for="review">Review:</label>
        <textarea id="review" name="review"></textarea>
        <br>
        <input type="submit" value="Submit">
    </form>
    <h2>Course Ratings</h2>
    <?php
    $ratingsQuery = "SELECT courses.name, ratings.rating, ratings.review FROM ratings JOIN courses ON ratings.course_id = courses.id";
    $result = $conn->query($ratingsQuery);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p><strong>Course:</strong> " . htmlspecialchars($row["name"]) . " - <strong>Rating:</strong> "
             . htmlspecialchars($row["rating"]) . "/5<br>" . "<strong>Review:</strong> " . nl2br(htmlspecialchars($row["review"])) . "</p>";
        }
    } else {
        echo "No ratings submitted yet.";
    }
    $conn->close();
    ?>
</body>
</html>
