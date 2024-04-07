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

// Create table if it does not exist
$table1 = "CREATE TABLE IF NOT EXISTS Courses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    courseName VARCHAR(255) NOT NULL,
    instructorName VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

$table2 = "CREATE TABLE IF NOT EXISTS Reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    courseId INT(6) UNSIGNED,
    studentName VARCHAR(255) NOT NULL,
    rating INT(1),
    review TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (courseId) REFERENCES Courses(id)
    )";

if (!$conn->query($table1) || !$conn->query($table2)) {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $courseName = $_POST["courseName"];
  $instructorName = $_POST["instructorName"];
  $studentName = $_POST["studentName"];
  $rating = $_POST["rating"];
  $review = $_POST["review"];
  
  // Insert course
  $sqlCourse = "INSERT INTO Courses (courseName, instructorName) VALUES (?, ?)";
  $stmt = $conn->prepare($sqlCourse);
  $stmt->bind_param("ss", $courseName, $instructorName);
  $stmt->execute();
  $last_id = $stmt->insert_id;
  
  // Insert review
  $sqlReview = "INSERT INTO Reviews (courseId, studentName, rating, review) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($sqlReview);
  $stmt->bind_param("isis", $last_id, $studentName, $rating, $review);
  $stmt->execute();
  
  echo "New records created successfully";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course Rating System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .form-input {
            margin-bottom: 10px;
        }
        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 8px;
            margin: 4px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .submit-btn {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>

<h2>Course Rating Form</h2>

<form action="" method="post">
  <div class="form-input">
    <label for="courseName">Course Name:</label><br>
    <input type="text" id="courseName" name="courseName" required><br>
  </div>
  <div class="form-input">
    <label for="instructorName">Instructor's Name:</label><br>
    <input type="text" id="instructorName" name="instructorName" required><br>
  </div>
   <div class="form-input">
    <label for="studentName">Your Name:</label><br>
    <input type="text" id="studentName" name="studentName" required><br>
  </div>
  <div class="form-input">
    <label for="rating">Rating (1-5):</label><br>
    <input type="number" id="rating" name="rating" min="1" max="5" required><br>
  </div>
  <div class="form-input">
    <label for="review">Review:</label><br>
    <textarea id="review" name="review" rows="4" required></textarea>
  </div>
  <input type="submit" class="submit-btn" value="Submit Review">
</form>

</body>
</html>
