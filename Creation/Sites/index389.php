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

// Create tables if they don't exist
$sqlUsers = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP
)";

$sqlCourses = "CREATE TABLE IF NOT EXISTS courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
course_name VARCHAR(50) NOT NULL,
description TEXT,
reg_date TIMESTAMP
)";

$sqlEnrollments = "CREATE TABLE IF NOT EXISTS enrollments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
course_id INT(6) UNSIGNED,
FOREIGN KEY (user_id) REFERENCES users(id),
FOREIGN KEY (course_id) REFERENCES courses(id),
reg_date TIMESTAMP
)";

$conn->query($sqlUsers);
$conn->query($sqlCourses);
$conn->query($sqlEnrollments);

// Handle user sign up
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['signup'])) {
  $username = $conn->real_escape_string($_POST['username']);
  $email = $conn->real_escape_string($_POST['email']);
  $password = $conn->real_escape_string(md5($_POST['password']));
  
  $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
  
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Handle course enrollment
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['enroll'])) {
  $userId = $conn->real_escape_string($_POST['userId']);
  $courseId = $conn->real_escape_string($_POST['courseId']);
  
  $sql = "INSERT INTO enrollments (user_id, course_id) VALUES ('$userId', '$courseId')";
  
  if ($conn->query($sql) === TRUE) {
    echo "Enrolled successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Online Course Enrollment</title>
</head>
<body>

<h2>Signup Form</h2>

<form method="post">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" required><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" required><br>
  <input type="submit" name="signup" value="Sign Up">
</form>

<h2>Enroll in Course</h2>

<form method="post">
  <label for="userId">User ID:</label><br>
  <input type="number" id="userId" name="userId" required><br>
  <label for="courseId">Course ID:</label><br>
  <input type="number" id="courseId" name="courseId" required><br>
  <input type="submit" name="enroll" value="Enroll">
</form>

</body>
</html>