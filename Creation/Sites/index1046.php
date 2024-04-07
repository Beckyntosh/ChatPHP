<?php
// Database configuration
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
$tableSql = "CREATE TABLE IF NOT EXISTS service_feedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    service_name VARCHAR(50) NOT NULL,
    user_name VARCHAR(50),
    rating INT(1),
    comments TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($tableSql) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $serviceName = $_POST['service_name']; 
    $userName = $_POST['user_name']; 
    $rating = $_POST['rating']; 
    $comments = $_POST['comments']; 

    $stmt = $conn->prepare("INSERT INTO service_feedback (service_name, user_name, rating, comments) VALUES (?, ?, ?, ?)");
    
    $stmt->bind_param("ssis", $serviceName, $userName, $rating, $comments);
    
    if($stmt->execute()){
        echo "<p>Feedback Submitted Successfully!</p>";
    } else {
        echo "<p>Error submitting feedback: " . $stmt->error . "</p>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Service Feedback System</title>
</head>
<body>
    <h1>Beauty Product Service - Feedback Form</h1>
    <form action="" method="post">
        <p>
            <label for="service_name">Service Name:</label>
            <input type="text" name="service_name" id="service_name" required>
        </p>
        <p>
            <label for="user_name">Your Name:</label>
            <input type="text" name="user_name" id="user_name">
        </p>
        <p>
            <label for="rating">Rating:</label>
            <select name="rating" id="rating" required>
                <option value="1">1 - Poor</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5 - Excellent</option>
            </select>
        </p>
        <p>
            <label for="comments">Comments:</label>
            <textarea name="comments" id="comments"></textarea>
        </p>
        <p>
            <input type="submit" value="Submit Feedback">
        </p>
    </form>
</body>
</html>
