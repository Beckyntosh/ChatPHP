<?php
// Connection parameters
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
$sql = "CREATE TABLE IF NOT EXISTS meal_plan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    day_of_week VARCHAR(50) NOT NULL,
    meal_type VARCHAR(50) NOT NULL,
    meal VARCHAR(100) NOT NULL,
    dietary_pref VARCHAR(50) NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql)) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $day_of_week = $conn->real_escape_string($_POST['day_of_week']);
    $meal_type = $conn->real_escape_string($_POST['meal_type']);
    $meal = $conn->real_escape_string($_POST['meal']);
    $dietary_pref = $conn->real_escape_string($_POST['dietary_pref']);
    
    $sql = "INSERT INTO meal_plan (day_of_week, meal_type, meal, dietary_pref) VALUES ('$day_of_week', '$meal_type', '$meal', '$dietary_pref')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Meal Plan</title>
</head>
<body>
    <h2>Create Your Weekly Meal Plan</h2>
    <form method="post">
        Day of Week: <input type="text" name="day_of_week" required><br>
        Meal Type (e.g., Breakfast, Lunch, Dinner): <input type="text" name="meal_type" required><br>
        Meal: <input type="text" name="meal" required><br>
        Dietary Preference (e.g., Vegan, Vegetarian): <input type="text" name="dietary_pref" required><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
