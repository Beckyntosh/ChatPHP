<?php

$serverName = "db";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "my_database";

// Create connection
$conn = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS dietary_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    preference VARCHAR(30) NOT NULL,
    UNIQUE KEY (preference)
    )";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS meal_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    day_of_week ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'),
    preference_id INT(6) UNSIGNED,
    FOREIGN KEY (preference_id) REFERENCES dietary_preferences(id) 
    )";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Insert dietary preferences if not exists
$preferences = ['Vegan', 'Vegetarian', 'Gluten-Free', 'Keto'];
foreach ($preferences as $preference) {
    $sql = "INSERT INTO dietary_preferences (preference) SELECT * FROM (SELECT '$preference') AS tmp WHERE NOT EXISTS (SELECT preference FROM dietary_preferences WHERE preference = '$preference') LIMIT 1;";
    if ($conn->query($sql) !== TRUE) {
        echo "Error inserting preferences: " . $conn->error;
    }
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"] ?? '';
    $description = $_POST["description"] ?? '';
    $day_of_week = $_POST["day_of_week"] ?? '';
    $preference = $_POST["preference"] ?? '';

    $sql = "INSERT INTO meal_plans (name, description, day_of_week, preference_id) VALUES (?, ?, ?, (SELECT id FROM dietary_preferences WHERE preference = ?))";
    
    if($stmt = $conn->prepare($sql)){
        $stmt->bind_param("ssss", $name, $description, $day_of_week, $preference);
        
        if($stmt->execute()){
            echo "Record created successfully.";
        } else{
            echo "ERROR: Could not execute query: $sql. " . $conn->error;
        }
        $stmt->close();
    } else{
        echo "ERROR: Could not prepare query: $sql. " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Meal Plan</title>
</head>
<body>

<h2>Create Your Meal Plan</h2>

<form action="" method="post">
    <label for="name">Meal Name:</label><br>
    <input type="text" id="name" name="name" required><br>
    <label for="description">Description:</label><br>
    <textarea id="description" name="description" required></textarea><br>
    <label for="day_of_week">Day of Week:</label><br>
    <select id="day_of_week" name="day_of_week" required>
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
        <option value="Sunday">Sunday</option>
    </select><br>
    <label for="preference">Dietary Preference:</label><br>
    <select id="preference" name="preference" required>
        <option value="Vegan">Vegan</option>
        <option value="Vegetarian">Vegetarian</option>
        <option value="Gluten-Free">Gluten-Free</option>
        <option value="Keto">Keto</option>
    </select><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
