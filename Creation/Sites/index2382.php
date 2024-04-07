<?php
// Simple script to handle enrollment and account creation for an online course.
// MySQL settings
$MYSQL_ROOT_PSWD = 'root';
$MYSQL_DB = 'my_database';
$servername = 'db';

// Create connection
$conn = new mysqli($servername, 'root', $MYSQL_ROOT_PSWD, $MYSQL_DB);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sqlUserTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(255),
registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$sqlCoursesTable = "CREATE TABLE IF NOT EXISTS courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
course_name VARCHAR(30) NOT NULL,
user_id INT(6) UNSIGNED,
FOREIGN KEY (user_id) REFERENCES users(id)
)";

$conn->query($sqlUserTable);
$conn->query($sqlCoursesTable);

// Handle form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt password

  // Insert the new user
  $sqlSignup = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
  $sqlSignup->bind_param("sss", $username, $email, $password);
  $sqlSignup->execute();

  // Get the user_id
  $last_id = $conn->insert_id;

  // Enroll in a course (Hardcoded for demo)
  $courseName = 'Coding in PHP';
  $sqlEnroll = $conn->prepare("INSERT INTO courses (course_name, user_id) VALUES (?, ?)");
  $sqlEnroll->bind_param("si", $courseName, $last_id);
  $sqlEnroll->execute();

  echo "Enrolled successfully";
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Course Enrollment</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h2>Signup for Online Coding Course</h2>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Signup and Enroll">
    </form> 
</body>
</html>
