<?php
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$table = "CREATE TABLE IF NOT EXISTS course_feedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(255) NOT NULL,
    learner_name VARCHAR(255),
    feedback TEXT,
    feedback_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
  echo ""; // Table creation success
} else {
  echo "Error creating table: " . $conn->error;
}

// Post feedback
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST['course_name'];
    $learner_name = $_POST['learner_name'];
    $feedback = $_POST['feedback'];

    $sql = "INSERT INTO course_feedback (course_name, learner_name, feedback) VALUES ('$course_name', '$learner_name', '$feedback')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Feedback successfully submitted! Thank you.');</script>";
    } else {
        echo "<script>alert('Error: ".$conn->error."');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Course Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .feedback-form {
            background-color: #fff;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        input[type=text], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 5px;
        }
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<h2>Leave a Feedback for a Course</h2>

<div class="feedback-form">
    <form action="" method="post">
        <label for="course_name">Course Name</label>
        <input type="text" id="course_name" name="course_name" required>

        <label for="learner_name">Your Name</label>
        <input type="text" id="learner_name" name="learner_name" required>

        <label for="feedback">Feedback</label>
        <textarea id="feedback" name="feedback" required></textarea>

        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>

<?php
$conn->close();
?>
