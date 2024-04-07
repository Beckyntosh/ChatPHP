<?php
// Connect to database
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

// Create table for courses if it does not exist
$createCoursesTable = "CREATE TABLE IF NOT EXISTS courses (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  category VARCHAR(50),
  reg_date TIMESTAMP
)";
if (!$conn->query($createCoursesTable)) {
  echo "Error creating table: " . $conn->error;
}

// Create table for user selected paths if it does not exist
$createUserPathsTable = "CREATE TABLE IF NOT EXISTS user_paths (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(6) UNSIGNED,
  course_id INT(6) UNSIGNED,
  reg_date TIMESTAMP,
  FOREIGN KEY (course_id) REFERENCES courses(id)
)";
if (!$conn->query($createUserPathsTable)) {
  echo "Error creating table: " . $conn->error;
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $category = $_POST['category'];
  $selectedCourses = $_POST['courses'] ?? [];

  $userId = 1; // Assuming a static user id for example, replace with actual user management system

  foreach ($selectedCourses as $courseId) {
    $insertPath = $conn->prepare("INSERT INTO user_paths (user_id, course_id) VALUES (?, ?)");
    $insertPath->bind_param("ii", $userId, $courseId);
    $insertPath->execute();
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Personalized Learning Path</title>
</head>
<body>
  <h1>Create Your Data Science Learning Path</h1>
  <form method="POST">
    <h2>Select Courses:</h2>
    <?php
    $category = 'Data Science';
    $getCourses = $conn->prepare("SELECT id, title FROM courses WHERE category=?");
    $getCourses->bind_param("s", $category);
    $getCourses->execute();
    $result = $getCourses->get_result();
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo '<div><input type="checkbox" name="courses[]" value="' . $row['id'] .'">' . $row['title'] . '</div>';
      }
    } else {
        echo "No courses available.";
    }
    ?>
    <input type="hidden" name="category" value="<?php echo htmlspecialchars($category); ?>">
    <input type="submit" value="Create Learning Path">
  </form>
</body>
</html>

<?php
$conn->close();
?>
