<?php
// DB connection setup
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

// Check if learning_path table exists, if not create it
$tableCheck = $conn->query("SHOW TABLES LIKE 'learning_path'");
if ($tableCheck->num_rows == 0) {
    $createTable = "CREATE TABLE learning_path (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        path_name VARCHAR(30) NOT NULL,
        description TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

    if ($conn->query($createTable) !== TRUE) {
        die("Error creating learning_path table: " . $conn->error);
    }
}

// Check if course table exists, if not create it
$tableCheck = $conn->query("SHOW TABLES LIKE 'course'");
if ($tableCheck->num_rows == 0) {
    $createTable = "CREATE TABLE course (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        path_id INT(6) UNSIGNED,
        course_name VARCHAR(50),
        description TEXT,
        FOREIGN KEY (path_id) REFERENCES learning_path(id)
        )";

    if ($conn->query($createTable) !== TRUE) {
        die("Error creating course table: " . $conn->error);
    }
}

// HTML and PHP for course selection and insertion into DB
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personalized Learning Path</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #0a0b0e; color: #33ff49; }
        .container { width: 80%; margin: auto; }
        header { text-align: center; }
        form { margin-top: 20px; }
        label, select, button { display: block; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Personalize Your Data Science Learning Path</h1>
        </header>
        <form action="" method="POST">
            <label for="pathName">Learning Path Name:</label>
            <input type="text" id="pathName" name="pathName" placeholder="Enter a name for your path...">

            <label for="courses">Select Courses:</label>
            <select id="courses" name="courses[]" multiple>
                <option value="Intro to Data Science">Intro to Data Science</option>
                <option value="Data Analysis with Python">Data Analysis with Python</option>
                <option value="Machine Learning Fundamentals">Machine Learning Fundamentals</option>
                <option value="Data Visualization Techniques">Data Visualization Techniques</option>
            </select>
            
            <button type="submit" name="submit">Create Learning Path</button>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $pathName = $conn->real_escape_string($_POST['pathName']);
            $courses = $_POST['courses'];
            
            // Insert learning path
            $insertPathQuery = "INSERT INTO learning_path (path_name) VALUES ('$pathName')";
            if ($conn->query($insertPathQuery)) {
                $pathId = $conn->insert_id;
                // Insert selected courses
                foreach ($courses as $course) {
                    $courseName = $conn->real_escape_string($course);
                    $insertCourseQuery = "INSERT INTO course (path_id, course_name) VALUES ('$pathId', '$courseName')";
                    if (!$conn->query($insertCourseQuery)) {
                        echo "Error: " . $conn->error;
                    }
                }
                echo "<p>Learning Path Created Successfully!</p>";
            } else {
                echo "Error: " . $conn->error;
            }
        }
        ?>
    </div>
</body>
</html>
<?php $conn->close(); ?>
