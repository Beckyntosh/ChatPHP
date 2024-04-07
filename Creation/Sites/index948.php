<?php
// Database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Creating connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they do not exist
$createTables = "
CREATE TABLE IF NOT EXISTS employees (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    registration_date TIMESTAMP
);
CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    reviewer_id INT(6) UNSIGNED,
    employee_id INT(6) UNSIGNED,
    performance_rating INT NOT NULL,
    feedback TEXT NOT NULL,
    review_date TIMESTAMP,
    FOREIGN KEY (reviewer_id) REFERENCES employees(id),
    FOREIGN KEY (employee_id) REFERENCES employees(id)
);";

if (!$conn->multi_query($createTables)) {
    echo "Error creating tables: " . $conn->error;
}

// Wait for multi queries to complete
do {
    if ($res = $conn->store_result()) {
        $res->free();
    }
} while ($conn->more_results() && $conn->next_result());

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reviewer_id = $_POST['reviewer_id'];
    $employee_id = $_POST['employee_id'];
    $performance_rating = $_POST['performance_rating'];
    $feedback = $_POST['feedback'];

    $stmt = $conn->prepare("INSERT INTO reviews (reviewer_id, employee_id, performance_rating, feedback) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiis", $reviewer_id, $employee_id, $performance_rating, $feedback);

    if ($stmt->execute()) {
        echo "New review created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Employee Performance Review System</title>
  </head>
  <body>

    <h2>Submit Performance Review</h2>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <label for="reviewer_id">Reviewer ID:</label><br>
      <input type="text" id="reviewer_id" name="reviewer_id" required><br>
      <label for="employee_id">Employee ID:</label><br>
      <input type="text" id="employee_id" name="employee_id" required><br>
      <label for="performance_rating">Performance Rating:</label><br>
      <input type="number" id="performance_rating" name="performance_rating" min="1" max="5" required><br>
      <label for="feedback">Feedback:</label><br>
      <textarea id="feedback" name="feedback" rows="4" cols="50" required></textarea><br>
      <input type="submit" value="Submit">
    </form> 
  
  </body>
</html>
