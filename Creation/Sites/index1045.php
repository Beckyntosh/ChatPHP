<?php

// MySQL connection setup
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create feedback table if it doesn't exist
// Table creation SQL
$createTableSql = "CREATE TABLE IF NOT EXISTS service_feedback (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  service_rating INT(1) NOT NULL,
  service_feedback VARCHAR(255) NOT NULL,
  submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($createTableSql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service_rating = $_POST['service_rating'];
    $service_feedback = $_POST['service_feedback'];

    $stmt = $conn->prepare("INSERT INTO service_feedback (service_rating, service_feedback) VALUES (?, ?)");
    $stmt->bind_param("is", $service_rating, $service_feedback);
    
    if ($stmt->execute()) {
        echo "Feedback submitted successfully!";
    } else {
        echo "Error submitting feedback: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bicycles Service Feedback</title>
    <style>
        body { font-family: 'Arial', sans-serif; margin: 0; padding: 20px; background-color: #f4f4f4; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h2 { text-align: center; color: #333; }
        form { display: flex; flex-direction: column; }
        label { margin-top: 10px; }
        input[type="text"], textarea { width: 100%; padding: 8px; margin: 8px 0; box-sizing: border-box; }
        input[type="submit"] { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 10px 0; border: none; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="container">
    <h2>Service Feedback Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="service_rating">Service Rating (1-5):</label>
        <input type="number" id="service_rating" name="service_rating" min="1" max="5" required>
        
        <label for="service_feedback">Service Feedback:</label>
        <textarea id="service_feedback" name="service_feedback" required></textarea>
        
        <input type="submit" value="Submit">
    </form>
</div>
    
</body>
</html>
