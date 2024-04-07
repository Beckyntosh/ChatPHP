<?php
// Simple script to demonstrate creating a personalized learning path for a Perfumes website.
// This is a simplistic, single-file approach and not recommended for production.

// Database connection settings
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Establish a database connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$createCoursesTable = "CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(255) NOT NULL
)";

$createLearningPathsTable = "CREATE TABLE IF NOT EXISTS learning_paths (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    course_ids VARCHAR(255) NOT NULL,
    path_name VARCHAR(255) NOT NULL
)";

$conn->query($createCoursesTable);
$conn->query($createLearningPathsTable);

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["createPath"])) {
    $userId = 1; // Static user ID for demonstration
    $courseIds = implode(",", $_POST['courses']);
    $pathName = $conn->real_escape_string($_POST['pathName']);
    
    // Insert learning path into the database
    $insertPathSQL = "INSERT INTO learning_paths (user_id, course_ids, path_name) VALUES ('$userId', '$courseIds', '$pathName')";
    if ($conn->query($insertPathSQL) === TRUE) {
        echo "<p>Learning path created successfully!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a Personalized Learning Path</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { margin: 20px; }
        select, input[type=text] { width: 100%; padding: 10px; margin: 10px 0; }
        input[type=submit] { padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        input[type=submit]:hover { opacity: 0.8; }
    </style>
</head>
<body>
<div class="container">
    <h2>Create Your Data Science Learning Path</h2>
    <form action="" method="post">
        <label for="pathName">Learning Path Name:</label>
        <input type="text" name="pathName" required>
        
        <label for="courses">Select Courses:</label>
        <select name="courses[]" multiple size="5" required>
            <?php
            $sql = "SELECT id, name FROM courses WHERE category='Data Science'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
                }
            } else {
                echo "<option value=''>No courses available</option>";
            }
            ?>
        </select>
        
        <input type="submit" name="createPath" value="Create Learning Path">
    </form>
</div>
</body>
</html>
<?php
$conn->close();
?>
