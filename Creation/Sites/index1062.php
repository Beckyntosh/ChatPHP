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

// Create tables
$employeesSql = "CREATE TABLE IF NOT EXISTS employees (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP
)";

$reviewsSql = "CREATE TABLE IF NOT EXISTS reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  employee_id INT(6) UNSIGNED,
  reviewer_id INT(6) UNSIGNED,
  performance_rating INT,
  comments TEXT,
  review_date TIMESTAMP,
  FOREIGN KEY (employee_id) REFERENCES employees(id),
  FOREIGN KEY (reviewer_id) REFERENCES employees(id)
)";

if ($conn->query($employeesSql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

if ($conn->query($reviewsSql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Insert mock data into employees table
$mockEmployees = [
  ['name' => 'John Doe', 'email' => 'john.doe@example.com'],
  ['name' => 'Jane Doe', 'email' => 'jane.doe@example.com'],
];

foreach ($mockEmployees as $employee) {
  $stmt = $conn->prepare("INSERT INTO employees (name, email) VALUES (?, ?)");
  $stmt->bind_param("ss", $employee['name'], $employee['email']);
  $stmt->execute();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $employee_id = $_POST["employee_id"];
  $reviewer_id = $_POST["reviewer_id"];
  $performance_rating = $_POST["performance_rating"];
  $comments = $_POST["comments"];

  $insertReview = $conn->prepare("INSERT INTO reviews (employee_id, reviewer_id, performance_rating, comments) VALUES (?, ?, ?, ?)");
  $insertReview->bind_param("iiis", $employee_id, $reviewer_id, $performance_rating, $comments);
  if ($insertReview->execute()) {
    echo "Review submitted successfully.";
  } else {
    echo "Error: " . $insertReview->error;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Performance Review System</title>
    <style>
        body {
            font-family: 'Courier New', monospace;
            background-color: #f0f0f0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
<div class="container">
  <h2>Employee Performance Review</h2>
  <form method="post">
    <p><label>Employee ID: <input type="number" name="employee_id" required></label></p>
    <p><label>Reviewer ID: <input type="number" name="reviewer_id" required></label></p>
    <p><label>Performance Rating (1-5): <input type="number" name="performance_rating" min="1" max="5" required></label></p>
    <p><label>Comments: <textarea name="comments" required></textarea></label></p>
    <p><button type="submit">Submit Review</button></p>
  </form>
</div>
</body>
</html>
<?php
$conn->close();
?>
