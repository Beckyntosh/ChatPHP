<?php
// Simple Gardening Tracker - Add Plant Feature

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

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plant_name = $_POST['plant_name'];
    $plant_type = $_POST['plant_type'];
    $care_schedule = $_POST['care_schedule'];
    $growth_stage = $_POST['growth_stage'];

    $sql = "INSERT INTO plants (plant_name, plant_type, care_schedule, growth_stage)
            VALUES ('" . $plant_name . "', '" . $plant_type . "', '" . $care_schedule . "', '" . $growth_stage . "')";

    if ($conn->query($sql) === TRUE) {
        echo "New plant added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Create "plants" table if not exists
$sql = "CREATE TABLE IF NOT EXISTS plants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
plant_name VARCHAR(30) NOT NULL,
plant_type VARCHAR(30) NOT NULL,
care_schedule VARCHAR(100) NOT NULL,
growth_stage VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";
$conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Plant to Gardening Tracker</title>
</head>
<body>

<h2>Add Plant Form</h2>

<form method="post">
    <label for="plant_name">Plant Name:</label><br>
    <input type="text" id="plant_name" name="plant_name" required><br>
    
    <label for="plant_type">Plant Type:</label><br>
    <input type="text" id="plant_type" name="plant_type" required><br>
    
    <label for="care_schedule">Care Schedule:</label><br>
    <input type="text" id="care_schedule" name="care_schedule" required><br>
    
    <label for="growth_stage">Growth Stage:</label><br>
    <input type="text" id="growth_stage" name="growth_stage" required><br><br>
    
    <input type="submit" value="Submit">
</form>

</body>
</html>