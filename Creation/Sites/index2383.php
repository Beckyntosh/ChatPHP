<?php
// Set database connection variables
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

// Create tables if not exists
$sqlUserTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

$sqlCourseTable = "CREATE TABLE IF NOT EXISTS courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userid INT(6) UNSIGNED,
course_name VARCHAR(50) NOT NULL,
FOREIGN KEY(userid) REFERENCES users(id)
)";

if ($conn->query($sqlUserTable) !== TRUE || $conn->query($sqlCourseTable) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Insert user data into database
    $sqlInsertUser = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

    if ($conn->query($sqlInsertUser) === TRUE) {
        $last_id = $conn->insert_id;
        $courseName = "Online Coding Course in PHP";
        $sqlInsertCourse = "INSERT INTO courses (userid, course_name) VALUES ('$last_id', '$courseName')";
        
        if ($conn->query($sqlInsertCourse) !== TRUE) {
            echo "Error: " . $sqlInsertCourse . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sqlInsertUser . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup for Online Courses</title>
</head>
<body>
    <h2>Signup for Online Coding Course in PHP</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        <input type="submit" name="submit" value="Signup">
    </form>
</body>
</html>
