<?php
// Simple script for User Account Creation and Online Course Enrollment - PHP example

// Database connection variables
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Create USERS table if not exists
$usersTableSql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(60) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if(!$mysqli->query($usersTableSql)){
    echo "ERROR creating users table." . $mysqli->error;
}

// Create COURSES table if not exists
$coursesTableSql = "CREATE TABLE IF NOT EXISTS courses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    course_name VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

if(!$mysqli->query($coursesTableSql)){
    echo "ERROR creating courses table." . $mysqli->error;
}

// Handle user registration
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['register'])){
        $username = $mysqli->real_escape_string($_POST['username']);
        $password = password_hash($mysqli->real_escape_string($_POST['password']), PASSWORD_DEFAULT);

        $insertUserSql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        if($mysqli->query($insertUserSql)){
            echo "User registered successfully.";
        } else{
            echo "Error: " . $insertUserSql . "<br>" . $mysqli->error;
        }
    }

    // Handle course enrollment
    if(isset($_POST['enroll'])){
        $userId = $mysqli->real_escape_string($_POST['user_id']);
        $courseName = $mysqli->real_escape_string($_POST['course_name']);

        $insertCourseSql = "INSERT INTO courses (user_id, course_name) VALUES ('$userId', '$courseName')";

        if($mysqli->query($insertCourseSql)){
            echo "Enrolled in course successfully.";
        } else {
            echo "Error: " . $insertCourseSql . "<br>" . $mysqli->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Course Enrollment</title>
</head>
<body>
    <h2>User Registration</h2>
    <form method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" name="register" value="Register">
    </form>

    <h2>Course Enrollment</h2>
    <form method="post">
        <label for="user_id">User ID:</label><br>
        <input type="text" id="user_id" name="user_id" required><br>
        <label for="course_name">Course Name:</label><br>
        <input type="text" id="course_name" name="course_name" required><br><br>
        <input type="submit" name="enroll" value="Enroll">
    </form>
</body>
</html>
<?php
$mysqli->close();
?>
