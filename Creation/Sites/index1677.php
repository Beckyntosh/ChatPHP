<?php

$mysql_root = 'root';
$mysql_db = 'my_database';
$servername = 'db';

// Create connection
$conn = new mysqli($servername, 'root', $mysql_root, $mysql_db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Courses table if it doesn't exist
$createCoursesTable = "CREATE TABLE IF NOT EXISTS courses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(250) NOT NULL,
    category VARCHAR(50) NOT NULL,
    description TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
if ($conn->query($createCoursesTable) === TRUE) {
    echo "Courses table created successfully or already exists.";
} else {
    echo "Error creating Courses table: " . $conn->error;
}

// Populate Courses table with example data if empty
$checkCoursesEmpty = "SELECT COUNT(*) AS total FROM courses";
$result = $conn->query($checkCoursesEmpty);
$row = $result->fetch_assoc();
if ($row['total'] == 0) {
    $insertCourses = "INSERT INTO courses (title, category, description) VALUES
                        ('Introduction to Data Science', 'Data Science', 'Learn the basics of data science.'),
                        ('Intermediate Data Science', 'Data Science', 'Deep dive into data science topics.'),
                        ('Advanced Data Science', 'Data Science', 'Become a Data Science expert.');";
    if ($conn->multi_query($insertCourses) === TRUE) {
        echo "Inserted initial course data successfully.";
    } else {
        echo "Error inserting data into Courses: " . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Custom Learning Path</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; }
        .course { border: 1px solid #ddd; padding: 10px; margin-bottom: 10px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Select Courses for Your 'Data Science' Learning Path</h2>
    <form action="submit_courses.php" method="post">
        <?php
        $sql = "SELECT id, title, description FROM courses WHERE category='Data Science'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="course"><h3>'. $row["title"]."</h3><p>". $row["description"].'</p><input type="checkbox" name="course_ids[]" value="'.$row["id"].'"> Select</div>';
            }
        } else {
            echo "0 results";
        }
        ?>
        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>

<?php $conn->close(); ?>
