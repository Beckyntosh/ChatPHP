<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Board Games Learning - Personalize Your Learning Path</title>
    <style>
        body { font-family: Arial, sans-serif; background-color:#f7d9a0; color: #333; }
        .container { width: 80%; margin: auto; background-color: #fef1e6; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h2 { color: #d35400; }
        .course { background-color: #fff0d4; padding: 10px; margin-bottom: 10px; border-radius: 5px; }
        .course:hover { background-color: #ffe4b3; }
        label { display: block; margin-bottom: 5px; }
        input[type=submit] { background-color: #d35400; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; }
        input[type=submit]:hover { background-color: #e67e22; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Customize Your Data Science Learning Path</h2>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="course">
                <label><input type="checkbox" name="courses[]" value="Introduction to Data Science"> Introduction to Data Science</label>
            </div>
            <div class="course">
                <label><input type="checkbox" name="courses[]" value="Data Analysis with Python"> Data Analysis with Python</label>
            </div>
            <div class="course">
                <label><input type="checkbox" name="courses[]" value="Machine Learning Fundamentals"> Machine Learning Fundamentals</label>
            </div>
            <div class="course">
                <label><input type="checkbox" name="courses[]" value="Deep Learning Basics"> Deep Learning Basics</label>
            </div>
            <input type="submit" name="submit" value="Create Learning Path">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST['courses'])) {
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

                // Attempt to create the table if it doesn't exist.
                $sql = "CREATE TABLE IF NOT EXISTS LearningPaths (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    course_name VARCHAR(255) NOT NULL,
                    user_id INT(6) UNSIGNED,
                    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                    )";

                if ($conn->query($sql) === TRUE) {
                    echo "Table LearningPaths created successfully <br>";
                } else {
                    echo "Error creating table: " . $conn->error;
                }

                // Let's assume the user_id is 1 for this example
                $userId = 1;

                foreach ($_POST['courses'] as $course) {
                    $stmt = $conn->prepare("INSERT INTO LearningPaths (course_name, user_id) VALUES (?, ?)");
                    $stmt->bind_param("si", $course, $userId);

                    if ($stmt->execute() === TRUE) {
                        echo "New record created successfully for course: " . $course . "<br>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }

                $conn->close();
            } else {
                echo "No course selected. Please choose at least one course.";
            }
        }
        ?>
    </div>
</body>
</html>
