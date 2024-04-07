<?php
// Connect to the database
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
$sql = "CREATE TABLE IF NOT EXISTS courses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(50) NOT NULL,
description TEXT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS user_paths (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
course_id INT(6) UNSIGNED,
FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $course_title = $_POST['course_title'] ?? '';
  $course_description = $_POST['course_description'] ?? '';

  $sql = "INSERT INTO courses (title, description) VALUES (?, ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $course_title, $course_description);
  
  if ($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Personalized Learning Paths</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            padding: 20px;
        }
        header{
            background: #50a3a2;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #076656 3px solid;
        }
        header h1 {
            text-align: center;
            margin: 0;
        }
        form {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<header>
    <div class="container">
        <h1>Personalized Learning Paths for Photography</h1>
    </div>
</header>

<div class="container">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="course_title">Course Title:</label><br>
        <input type="text" id="course_title" name="course_title" value=""><br>

        <label for="course_description">Course Description:</label><br>
        <textarea id="course_description" name="course_description"></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>