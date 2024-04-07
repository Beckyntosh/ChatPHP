<?php

// Database connection
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

// Table creation
$sql = "CREATE TABLE IF NOT EXISTS service_feedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    service_type VARCHAR(50) NOT NULL,
    client_name VARCHAR(50),
    rating INT(1),
    feedback TEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    //echo "Table service_feedback created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert feedback
if(isset($_POST['submit'])){
    $service_type = $_POST['service_type'];
    $client_name = $_POST['client_name'];
    $rating = $_POST['rating'];
    $feedback = $_POST['feedback'];

    $sql = "INSERT INTO service_feedback (service_type, client_name, rating, feedback)
    VALUES ('$service_type', '$client_name', '$rating', '$feedback')";

    if ($conn->query($sql) === TRUE) {
        //echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Feedback Form</title>
</head>
<body>

<h2>Service Feedback Form</h2>

<form action="" method="post">
  
  <label for="service_type">Service Type:</label><br>
  <input type="text" id="service_type" name="service_type" required><br>
  
  <label for="client_name">Your Name:</label><br>
  <input type="text" id="client_name" name="client_name" required><br>
  
  <label for="rating">Rating (1-5):</label><br>
  <select id="rating" name="rating">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select><br>
  
  <label for="feedback">Feedback:</label><br>
  <textarea id="feedback" name="feedback" rows="4" cols="50" required></textarea><br><br>
  
  <input type="submit" name="submit" value="Submit">
</form> 

</body>
</html>
