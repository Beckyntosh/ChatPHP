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

// Create table for Courses
$createCoursesTable = "CREATE TABLE IF NOT EXISTS Courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
title VARCHAR(255) NOT NULL,
description TEXT,
CONSTRAINT title_unique UNIQUE (title)
)";

if ($conn->query($createCoursesTable) === TRUE) {
    // echo "Table Courses created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Create table for UserCourses
$createUserCoursesTable = "CREATE TABLE IF NOT EXISTS UserCourses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userId INT(6) UNSIGNED,
courseId INT(6) UNSIGNED,
FOREIGN KEY (courseId) REFERENCES Courses(id),
UNIQUE KEY (userId, courseId)
)";

if ($conn->query($createUserCoursesTable) === TRUE) {
    // echo "Table UserCourses created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $insertSql = "INSERT INTO Courses (title, description) VALUES (?, ?)";

    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("ss", $title, $description);

    if ($stmt->execute()) {
        echo "<p>Course added successfully.</p>";
    } else {
        echo "<p>Error adding course: " . $conn->error . "</p>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Create Personalized Learning Path</title>
</head>
<body>
<h2>Add New Course</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="title">Title:</label><br>
  <input type="text" id="title" name="title" required><br>
  <label for="description">Description:</label><br>
  <textarea id="description" name="description" required></textarea><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>