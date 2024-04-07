<?php
// Simple Feedback System in PHP/MySQLi

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

// Create database tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
course_name VARCHAR(255) NOT NULL,
registration_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS feedback (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
course_id INT(6) UNSIGNED,
feedback_text TEXT NOT NULL,
rating INT(1),
FOREIGN KEY (course_id) REFERENCES courses(id),
submission_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Insert feedback
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $course_id = $_POST["course_id"];
    $feedback = $_POST["feedback"];
    $rating = $_POST["rating"];

    $stmt = $conn->prepare("INSERT INTO feedback (course_id, feedback_text, rating) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $course_id, $feedback, $rating);
    $stmt->execute();
    $stmt->close();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Course Feedback System</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 600px; margin: auto; }
        form { margin-top: 20px; }
        textarea { width: 100%; }
        label, select, input, button { display: block; margin: 10px 0; }
    </style>
</head>
<body>

<div class="container">
    <h2>Course Feedback Form</h2>
    <form method="post" action="">
        <label for="course">Course:</label>
        <select name="course_id" required>
            <?php
            $sql = "SELECT * FROM courses";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["course_name"] . "</option>";
                }
            } else {
                echo "<option>No courses available</option>";
            }
            ?>
        </select>

        <label for="feedback">Feedback:</label>
        <textarea name="feedback" required></textarea>

        <label for="rating">Rating:</label>
        <select name="rating" required>
            <option value="1">1 - Poor</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5 - Excellent</option>
        </select>

        <button type="submit" name="submit">Submit Feedback</button>
    </form>
</div>

</body>
</html>

<?php
$conn->close();
?>
