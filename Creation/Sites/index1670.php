<?php
// Define database connection parameters
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'my_database');

// Connect to the database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$createCoursesTable = "CREATE TABLE IF NOT EXISTS courses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$createLearningPathsTable = "CREATE TABLE IF NOT EXISTS learning_paths (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    course_id INT(6) UNSIGNED,
    FOREIGN KEY (course_id) REFERENCES courses(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$conn->query($createCoursesTable);
$conn->query($createLearningPathsTable);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["course_id"])) {
    $userId = 1; // Assuming a user ID of 1 for demonstration
    $courseId = $conn->real_escape_string($_POST["course_id"]);

    $sql = "INSERT INTO learning_paths (user_id, course_id) VALUES ('$userId', '$courseId')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Course added to your learning path!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personalized Learning Path</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Data Science Learning Path</h1>
    <form action="" method="post">
        <label for="course_id">Select Courses:</label>
        <select id="course_id" name="course_id">
            <?php
            $sql = "SELECT id, name FROM courses WHERE category='Data Science'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
                }
            } else {
                echo "<option value=''>No Courses Available</option>";
            }
            ?>
        </select>
        <button type="submit">Add to Learning Path</button>
    </form>

    <h2>Your Learning Path:</h2>
    <ul>
        <?php
        $sql = "SELECT c.name FROM learning_paths lp JOIN courses c ON lp.course_id = c.id WHERE lp.user_id = 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<li>" . $row["name"] . "</li>";
            }
        } else {
            echo "<li>No courses added yet.</li>";
        }
        ?>
    </ul>
</body>
</html>

<?php
$conn->close();
?>
