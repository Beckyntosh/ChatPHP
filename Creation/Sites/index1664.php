<?php

// Database Configuration
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

// Create tables if they do not exist
$tables_sql = array();

// Table for Courses
$tables_sql[] = "CREATE TABLE IF NOT EXISTS courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
category VARCHAR(255) NOT NULL
)";

// Table for Learning Paths
$tables_sql[] = "CREATE TABLE IF NOT EXISTS learning_paths (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
courses_id TEXT NOT NULL
)";

foreach($tables_sql as $sql) {
    if ($conn->query($sql) !== TRUE) {
        echo "Error creating table: " . $conn->error;
    }
}

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $path_name = $_POST['path_name'];
    $selected_courses = implode(",", $_POST['courses']);

    // Insert new learning path
    $sql = "INSERT INTO learning_paths (name, courses_id) VALUES ('$path_name', '$selected_courses')";

    if ($conn->query($sql) === TRUE) {
        echo "New learning path created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Personalized Learning Path</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { margin: 20px; }
        .course-option { margin-bottom: 10px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Create Your Data Science Learning Path</h1>
    <form action="" method="post">
        <div>
            <label for="path_name">Learning Path Name:</label>
            <input type="text" id="path_name" name="path_name" required>
        </div>
        <div>
            <h3>Select Courses:</h3>
            <?php
            // Fetch all courses from 'Data Science' category
            $sql = "SELECT id, title FROM courses WHERE category = 'Data Science'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<div class="course-option"><input type="checkbox" name="courses[]" value="' . $row["id"]. '">' . $row["title"] . '</div>';
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
        <button type="submit">Create Learning Path</button>
    </form>
</div>
</body>
</html>
<?php
$conn->close();
?>
