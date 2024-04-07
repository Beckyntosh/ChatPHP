<?php
// Simple Meal Plan System for Vinyl Records Website

// Database connection parameters
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

// Create tables if they don't exist
$createTablesSql = "CREATE TABLE IF NOT EXISTS MealPlans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plan_name VARCHAR(30) NOT NULL,
    dietary_preference VARCHAR(30) NOT NULL,
    day_of_week ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday') NOT NULL,
    meal VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($createTablesSql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $plan_name = $_POST['plan_name'];
    $dietary_preference = $_POST['dietary_preference'];
    $day_of_week = $_POST['day_of_week'];
    $meal = $_POST['meal'];
    
    $stmt = $conn->prepare("INSERT INTO MealPlans (plan_name, dietary_preference, day_of_week, meal) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $plan_name, $dietary_preference, $day_of_week, $meal);
    
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Meal Plan for Vinyl Records Website</title>
</head>
<body>

<h2>Create Your Weekly Meal Plan</h2>

<form action="" method="post">
    <label for="plan_name">Plan Name:</label><br>
    <input type="text" id="plan_name" name="plan_name" required><br>
    <label for="dietary_preference">Dietary Preference:</label><br>
    <input type="text" id="dietary_preference" name="dietary_preference" required><br>
    <label for="day_of_week">Day of the Week:</label><br>
    <select id="day_of_week" name="day_of_week" required>
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
        <option value="Sunday">Sunday</option>
    </select><br>
    <label for="meal">Meal:</label><br>
    <input type="text" id="meal" name="meal" required><br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
