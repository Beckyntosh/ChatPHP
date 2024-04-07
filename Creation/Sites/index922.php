<?php
// Establish connection to the database
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

// Create table if not exists
$createTable = "CREATE TABLE IF NOT EXISTS course_feedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    course_name VARCHAR(255) NOT NULL, 
    learner_name VARCHAR(255), 
    rating INT(1), 
    feedback TEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($createTable) === TRUE) {
  // Echo "Table course_feedback created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert feedback into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST['course_name'];
    $learner_name = $_POST['learner_name'];
    $rating = $_POST['rating'];
    $feedback = $_POST['feedback'];

    $insertSQL = "INSERT INTO course_feedback (course_name, learner_name, rating, feedback)
    VALUES ('$course_name', '$learner_name', '$rating', '$feedback')";

    if ($conn->query($insertSQL) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $insertSQL . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Course Feedback</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        form { display: flex; flex-direction: column; }
        label, input, textarea, button { margin-bottom: 10px; }
        input, textarea, button { padding: 10px; }
        button { cursor: pointer; }
    </style>
</head>
<body>
<div class="container">
    <h2>Leave Feedback for a Course</h2>
    <form action="" method="post">
        <label for="course_name">Course Name:</label>
        <input type="text" id="course_name" name="course_name" required>

        <label for="learner_name">Your Name:</label>
        <input type="text" id="learner_name" name="learner_name" required>

        <label for="rating">Rating (1-5):</label>
        <input type="number" id="rating" name="rating" min="1" max="5" required>
        
        <label for="feedback">Feedback:</label>
        <textarea id="feedback" name="feedback" rows="4" required></textarea>
        
        <button type="submit">Submit Feedback</button>
    </form>
</div>
</body>
</html>
