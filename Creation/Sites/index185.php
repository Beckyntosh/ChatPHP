<?php
// Simple example code for creating a Personalized Learning Path on a Books website.
// Note: This is a basic code snippet. For a full application, consider adding security features like input validation, prepared statements, and more.

$mysql_host = "db";
$mysql_username = "root";
$mysql_password = "root";
$mysql_database = "my_database";

// Create connection
$conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database and tables if they don't exist
$sql = "CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS users_learning_paths (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT,
    user_id INT,
    added_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(id)
    )";
$conn->query($sql);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["user_id"]) && isset($_POST["course_id"])) {
    $user_id = $_POST["user_id"];
    $course_id = $_POST["course_id"];

    $sql = "INSERT INTO users_learning_paths (user_id, course_id) VALUES (?, ?)";

    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $course_id);

    if ($stmt->execute()) {
        echo "Learning path updated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
}

// Retrieve Courses
$sql = "SELECT id, title FROM courses";
$course_result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Personalized Learning Path</title>
</head>
<body>
    <h2>Select Courses to Add to Your Learning Path</h2>
    
    <form method="POST">
Assuming user_id 1 for demo
        <select name="course_id">
        <?php if ($course_result->num_rows > 0): ?>
            <?php while($row = $course_result->fetch_assoc()): ?>
            <option value="<?php echo $row["id"]; ?>"><?php echo $row["title"]; ?></option>
            <?php endwhile; ?>
        <?php else: ?>
            <option>No courses found</option>
        <?php endif; ?>
        </select>
        <button type="submit">Add Course</button>
    </form>
</body>
</html>