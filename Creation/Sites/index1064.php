<?php
// Define MySQL connection parameters
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
$createEmployeesTable = "CREATE TABLE IF NOT EXISTS employees (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  department VARCHAR(50) NOT NULL,
  registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$createReviewsTable = "CREATE TABLE IF NOT EXISTS reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  employee_id INT(6) UNSIGNED NOT NULL,
  reviewer_id INT(6) UNSIGNED NOT NULL,
  content TEXT NOT NULL,
  rating DECIMAL(2,1) NOT NULL,
  review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (employee_id) REFERENCES employees(id),
  FOREIGN KEY (reviewer_id) REFERENCES employees(id)
)";

if ($conn->query($createEmployeesTable) === TRUE && $conn->query($createReviewsTable) === TRUE) {
  // Tables created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $employeeId = $_POST['employee_id'];
  $reviewerId = $_POST['reviewer_id'];
  $content = $_POST['content'];
  $rating = $_POST['rating'];

  // Insert review into database
  $stmt = $conn->prepare("INSERT INTO reviews (employee_id, reviewer_id, content, rating) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("iisd", $employeeId, $reviewerId, $content, $rating);

  if($stmt->execute()){
    echo "Review successfully saved.";
  } else{
    echo "Error: " . $stmt->error;
  }
  
  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Performance Review System</title>
</head>
<body>
    <h2>Submit Performance Review</h2>
    <form method="post">
        <label for="employee_id">Employee ID:</label><br>
        <input type="number" name="employee_id" id="employee_id" required><br>
        <label for="reviewer_id">Reviewer ID:</label><br>
        <input type="number" name="reviewer_id" id="reviewer_id" required><br>
        <label for="content">Review Content:</label><br>
        <textarea name="content" id="content" required></textarea><br>
        <label for="rating">Rating (0.0 - 5.0):</label><br>
        <input type="text" name="rating" id="rating" pattern="\d+(\.\d{1})?" required><br>
        <input type="submit" value="Submit Review">
    </form>
</body>
</html>
