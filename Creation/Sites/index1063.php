<?php
// Prevent direct access if the file is not POSTed to
if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Access Denied');
}

// Database connection details
$host = 'db';
$username = 'root';
$password = 'root';
$dbname = 'my_database';
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the tables if they don't exist
$sql = "CREATE TABLE IF NOT EXISTS employees (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(50) NOT NULL,
    position VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
)";

if (!$conn->query($sql)) {
    die("Error creating employee table: " . $conn->error);
}

$sql = "CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    employee_id INT(6) UNSIGNED,
    reviewer_id INT(6) UNSIGNED,
    content TEXT NOT NULL,
    rating INT(1),
    review_date TIMESTAMP,
    FOREIGN KEY (employee_id) REFERENCES employees(id),
    FOREIGN KEY (reviewer_id) REFERENCES employees(id)
)";

if (!$conn->query($sql)) {
    die("Error creating reviews table: " . $conn->error);
}

// Check if form is submitted
if(isset($_POST['submit'])) {
    $employeeId = $_POST['employee_id'];
    $reviewerId = $_POST['reviewer_id'];
    $content = $_POST['content'];
    $rating = $_POST['rating'];

    // Insert a new review
    $stmt = $conn->prepare("INSERT INTO reviews (employee_id, reviewer_id, content, rating) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iisi", $employeeId, $reviewerId, $content, $rating);
    
    if (!$stmt->execute()) {
        die("Error: " . $stmt->error);
    }
    $stmt->close();
    echo "Review submitted successfully!";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Performance Review Form</title>
</head>
<body>
    <h2>Employee Performance Review</h2>
    <form action="employee_performance_review.php" method="POST">
        <label for="employee_id">Employee ID:</label><br>
        <input type="number" id="employee_id" name="employee_id" required><br>
        <label for="reviewer_id">Reviewer ID:</label><br>
        <input type="number" id="reviewer_id" name="reviewer_id" required><br>
        <label for="content">Review Content:</label><br>
        <textarea id="content" name="content" required></textarea><br>
        <label for="rating">Rating:</label><br>
        <select name="rating" id="rating" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br>
        <input type="submit" name="submit" value="Submit Review">
    </form>
</body>
</html>
