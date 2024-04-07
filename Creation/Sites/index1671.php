<?php
// Simple example - not production-ready. Lack of input validation, error handling, and security practices like prepared statements for SQL injection prevention.

// Database configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Establishing connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Creating a table for courses if it does not exist
$createCoursesTable = "CREATE TABLE IF NOT EXISTS courses (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(30) NOT NULL,
  category VARCHAR(30) NOT NULL,
  description TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createCoursesTable)) {
    echo "Error creating table: " . $conn->error;
}

// Creating a table for user's learning paths if it does not exist
$createLearningPathTable = "CREATE TABLE IF NOT EXISTS learning_paths (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(6) UNSIGNED NOT NULL,
  course_ids VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createLearningPathTable)) {
    echo "Error creating table: " . $conn->error;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personalized Learning Path</title>
    <style>
        /* Cyberpunk style classes */
        body {
            background-color: #0a0b0e;
            color: #00ffea;
            font-family: 'Courier New', Courier, monospace;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        h1, h2 {
            color: #ff0097;
        }
        .course-list {
            list-style: none;
            padding: 0;
        }
        .course-list li {
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #ff0097;
            color: #0a0b0e;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create Your Personalized Learning Path</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <h2>Select Courses for 'Data Science'</h2>
            <?php
            // Fetching Data Science courses from the database
            $sql = "SELECT id, title FROM courses WHERE category='Data Science'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<ul class="course-list">';
                while($row = $result->fetch_assoc()) {
                    echo '<li><input type="checkbox" name="courses[]" value="' . $row["id"] . '"> ' . $row["title"] . '</li>';
                }
                echo '</ul>';
            } else {
                echo "No courses found";
            }
            ?>
            <input type="submit" name="submit" value="Create Learning Path">
        </form>
        <?php
            if(isset($_POST['submit'])) {
                // Assumption: user_id is statically set to 1 for example purpose
                $user_id = 1;
                $course_ids = implode(",", $_POST['courses']);

                // Inserting learning path into the database
                $sql = "INSERT INTO learning_paths (user_id, course_ids) VALUES ('$user_id', '$course_ids')";
                
                if ($conn->query($sql) === TRUE) {
                    echo "<h2>Learning Path Created Successfully!</h2>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }

            // Close connection
            $conn->close();
        ?>
    </div>
</body>
</html>
