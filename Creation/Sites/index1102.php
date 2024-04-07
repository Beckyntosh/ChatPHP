<?php
// Connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Attempt to connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$createTableSql = "CREATE TABLE IF NOT EXISTS student_grades (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(50) NOT NULL,
    credits INT(3) NOT NULL,
    grade DECIMAL(3,2) NOT NULL,
    reg_date TIMESTAMP
)";
if ($conn->query($createTableSql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST["course_name"];
    $credits     = (int)$_POST["credits"];
    $grade       = (float)$_POST["grade"];

    $stmt = $conn->prepare("INSERT INTO student_grades (course_name, credits, grade) VALUES (?, ?, ?)");
    $stmt->bind_param("sid", $course_name, $credits, $grade);
    if (!$stmt->execute()) {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Retrieve grades for GPA calculation
$gpa = 0;
$total_credits = 0;
$gpa_sql = "SELECT credits, grade FROM student_grades";
$result = $conn->query($gpa_sql);
if ($result->num_rows > 0) {
    $total_grade_points = 0;
    while($row = $result->fetch_assoc()) {
        $total_grade_points += $row["grade"] * $row["credits"];
        $total_credits += $row["credits"];
    }
    if ($total_credits > 0) {
        $gpa = $total_grade_points / $total_credits;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>GPA Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        form {
            display: grid;
            grid-gap: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>GPA Calculator</h2>
    <form action="" method="post">
        <label for="course_name">Course Name</label>
        <input type="text" id="course_name" name="course_name" required>
        <label for="credits">Credits</label>
        <input type="number" id="credits" name="credits" required>
        <label for="grade">Grade (4.0 Scale)</label>
        <input type="text" id="grade" name="grade" required>
        <button type="submit">Add Grade</button>
    </form>
    <h3>Your GPA: <?=number_format($gpa, 2)?></h3>
</div>
</body>
</html>
