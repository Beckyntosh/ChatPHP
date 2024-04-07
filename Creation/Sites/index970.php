<?php

// Database information
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Creating connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for feedback if it doesn't exist
$tableSql = "CREATE TABLE IF NOT EXISTS service_feedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    service_type VARCHAR(50) NOT NULL,
    rating INT(1) NOT NULL,
    comments TEXT,
    reg_date TIMESTAMP
    )";

if ($conn->query($tableSql) === TRUE) {
    // echo "Table service_feedback created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service_type = $_POST['service_type'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];

    // Prepare the insert statement
    $stmt = $conn->prepare("INSERT INTO service_feedback (service_type, rating, comments) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $service_type, $rating, $comments);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<p>Feedback submitted successfully!</p>";
    } else {
        echo "<p>Error submitting feedback: " . $stmt->error . "</p>";
    }

    // Close statement
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Feedback System</title>
</head>
<body>
    <h2>Service Feedback Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        Service Type: <input type="text" name="service_type" required>
        <br><br>
        Rating:
        <select name="rating">
            <option value="1">1 - Poor</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5 - Excellent</option>
        </select>
        <br><br>
        Comments: <textarea name="comments" rows="5" cols="40"></textarea>
        <br><br>
        <input type="submit" name="submit" value="Submit">  
    </form>
</body>
</html>
