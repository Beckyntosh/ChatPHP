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

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS CourseFeedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    courseName VARCHAR(255) NOT NULL,
    participantName VARCHAR(255),
    rating INT(1),
    comment TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table CourseFeedback created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $courseName = $_POST['courseName'];
    $participantName = $_POST['participantName'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $stmt = $conn->prepare("INSERT INTO CourseFeedback (courseName, participantName, rating, comment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $courseName, $participantName, $rating, $comment);

    if($stmt->execute()) {
        echo "Feedback submitted successfully";
    } else {
        echo "Error submitting feedback: " . $conn->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Course Feedback</title>
</head>
<body>
    <h2>Course Feedback Form</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="courseName">Course Name:</label><br>
        <input type="text" id="courseName" name="courseName" required><br>
        <label for="participantName">Your Name:</label><br>
        <input type="text" id="participantName" name="participantName" required><br>
        <label for="rating">Rating (1-5):</label><br>
        <input type="number" id="rating" name="rating" min="1" max="5" required><br>
        <label for="comment">Comment:</label><br>
        <textarea id="comment" name="comment" rows="4" cols="50" required></textarea><br>
        <input type="submit" value="Submit">
    </form> 
</body>
</html>
