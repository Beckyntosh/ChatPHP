<?php
// Initialize connection variables
$servername = "db";
$database = "my_database";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exists
$createCoursesTable = "CREATE TABLE IF NOT EXISTS courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
course_name VARCHAR(255) NOT NULL,
category VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";

$createUserCoursesTable = "CREATE TABLE IF NOT EXISTS user_courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
course_id INT(6) UNSIGNED,
FOREIGN KEY (course_id) REFERENCES courses(id),
reg_date TIMESTAMP
)";

if ($conn->query($createCoursesTable) === TRUE && $conn->query($createUserCoursesTable) === TRUE) {
    // Tables created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedCourses = $_POST["courses"] ?? [];
    $userId = 1; // Assuming a logged in user with ID 1, implement your user session logic as needed
    foreach ($selectedCourses as $courseId) {
        $sql = "INSERT INTO user_courses (user_id, course_id) VALUES ('$userId', '$courseId')";
        if (!$conn->query($sql) === TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Fetch courses
$sql = "SELECT * FROM courses WHERE category = 'Data Science'";
$result = $conn->query($sql);
$courses = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $courses[]=$row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      body { font-family: Arial, sans-serif; }
      .course-selection { margin-bottom: 20px; }
      button { padding: 10px; font-size: 16px; }
    </style>
    <title>Personalized Learning Path</title>
</head>
<body>

<h2>Select Courses for Your 'Data Science' Learning Path</h2>

<form method="POST">
    <div class="course-selection">
        <?php foreach($courses as $course): ?>
        <input type="checkbox" id="course_<?php echo $course['id']; ?>" name="courses[]" value="<?php echo $course['id']; ?>">
        <label for="course_<?php echo $course['id']; ?>"><?php echo htmlspecialchars($course['course_name']); ?></label><br>
        <?php endforeach; ?>
    </div>
    <button type="submit">Create Learning Path</button>
</form>

</body>
</html>
