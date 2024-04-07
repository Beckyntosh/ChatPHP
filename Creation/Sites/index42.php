<?php

// Establish database connection
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

// Creating Courses table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS Courses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(255) NOT NULL,
    duration INT(10),
    difficulty_level VARCHAR(50),
    instructor_rating DECIMAL(3,2),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Successful table creation or existence confirmation
} else {
    echo "Error creating table: " . $conn->error;
}

// Checking for a form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $duration = $_POST['duration'];
    $difficulty_level = $_POST['difficulty_level'];
    $instructor_rating = $_POST['instructor_rating'];

    // Basic query with filtering
    $query = "SELECT * FROM Courses WHERE 1=1 ";
    if (!empty($duration)) {
        $query .= "AND duration <= $duration ";
    }
    if (!empty($difficulty_level)) {
        $query .= "AND difficulty_level = '$difficulty_level' ";
    }
    if (!empty($instructor_rating)) {
        $query .= "AND instructor_rating >= $instructor_rating ";
    }

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Course Name: " . $row["course_name"]. " " . $row["duration"]. " " . $row["difficulty_level"]. " " . $row["instructor_rating"]. "<br>";
        }
    } else {
        echo "0 results";
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Search</title>
</head>
<body>
    <h2>Search for a Course</h2>
    <form method="post">
        <label for="duration">Duration (in hours):</label>
        <input type="number" id="duration" name="duration">
        <br>
        <label for="difficulty_level">Difficulty Level:</label>
        <select id="difficulty_level" name="difficulty_level">
            <option value="">Any</option>
            <option value="Beginner">Beginner</option>
            <option value="Intermediate">Intermediate</option>
            <option value="Advanced">Advanced</option>
        </select>
        <br>
        <label for="instructor_rating">Minimum Instructor Rating (1-5):</label>
        <input type="number" id="instructor_rating" name="instructor_rating" min="1" max="5" step="0.1">
        <br>
        <input type="submit" value="Search">
    </form>
</body>
</html>