<?php
// Database connection
$servername = "db";
$username = "root";
$password = 'root';
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exist
$createTables = "
CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS learning_paths (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    user_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS learning_path_courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    learning_path_id INT,
    course_id INT,
    FOREIGN KEY (learning_path_id) REFERENCES learning_paths(id),
    FOREIGN KEY (course_id) REFERENCES courses(id)
);
";

if (!$conn->multi_query($createTables)) {
    echo "Error creating tables: " . $conn->error;
}

// Wait for multi_query to finish
do {
    if ($res = $conn->store_result()) {
        $res->free();
    }
} while ($conn->more_results() && $conn->next_result());

// HTML and PHP mixed for frontend and functionality
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personalized Learning Path</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; }
        .container { width: 80%; margin: 20px auto; }
        table, th, td { border: 1px solid black; border-collapse: collapse; }
        th, td { padding: 10px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<div class="container">
    <h2>Create Your Personalized Learning Path</h2>
    <form action="" method="POST">
        <label for="pathName">Learning Path Name:</label><br>
        <input type="text" id="pathName" name="pathName" required><br><br>
        <input type="submit" name="createPath" value="Create Learning Path">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['createPath'])) {
        $pathName = $conn->real_escape_string($_POST['pathName']);
        $sql = "INSERT INTO learning_paths (name, user_id) VALUES ('$pathName', 1)"; // assuming user_id = 1 for simplicity

        if ($conn->query($sql) === TRUE) {
            echo "New learning path created successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>

    <h3>Available Courses</h3>
    <table>
        <tr>
            <th>Course Title</th>
            <th>Description</th>
            <th>Add to Path</th>
        </tr>
        <?php
        $coursesQuery = "SELECT * FROM courses";
        $result = $conn->query($coursesQuery);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>"
                    . "<td>" . $row["title"] . "</td>"
                    . "<td>" . $row["description"] . "</td>"
                    . "<td><form action='' method='POST'><input type='hidden' name='courseId' value='" . $row["id"] . "'><input type='submit' name='addCourse' value='Add'></form></td>"
                    . "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No courses available</td></tr>";
        }
        ?>
    </table>
</div>

<?php
// Logic to add course to a learning path
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addCourse'])) {
    $courseId = $conn->real_escape_string($_POST['courseId']);
    $learningPathId = 1; // Assuming learning path id = 1 for simplicity

    $sql = "INSERT INTO learning_path_courses (learning_path_id, course_id) VALUES ('$learningPathId', '$courseId')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Course added successfully to the learning path.');</script>";
    } else {
        echo "<script>alert('Error: ".$conn->error."');</script>";
    }
}

$conn->close();
?>

</body>
</html>