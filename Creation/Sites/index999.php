<?php
// Define database connection
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

// Create table if does not exist
$sql = "CREATE TABLE IF NOT EXISTS feedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(50) NOT NULL,
    effectiveness_rating TINYINT NOT NULL,
    comments TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Insert data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST['course_name'];
    $effectiveness_rating = $_POST['effectiveness_rating'];
    $comments = $_POST['comments'];
    
    $sql = "INSERT INTO feedback (course_name, effectiveness_rating, comments) VALUES ('$course_name', '$effectiveness_rating', '$comments')";
    
    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback Form</title>
</head>
<body>
<h2>Online Course Feedback</h2>
<form method="POST">
    <label for="course_name">Course Name:</label><br>
    <input type="text" id="course_name" name="course_name" required><br>
    <label for="effectiveness_rating">Effectiveness Rating (1-5):</label><br>
    <input type="number" id="effectiveness_rating" name="effectiveness_rating" min="1" max="5" required><br>
    <label for="comments">Comments:</label><br>
    <textarea id="comments" name="comments"></textarea><br>
    <input type="submit" value="Submit">
</form>

<?php
// Fetch and display data
$sql = "SELECT course_name, effectiveness_rating, comments FROM feedback ORDER BY reg_date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Feedback Received</h2>";
    while($row = $result->fetch_assoc()) {
        echo "<p>Course Name: " . $row["course_name"]. " - Rating: " . $row["effectiveness_rating"]. " - Comments: " . $row["comments"]. "</p>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</body>
</html>
