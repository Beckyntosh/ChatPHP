<?php
// Simple example for educational purposes only. This approach lacks security measures, please research and implement prepared statements to prevent SQL injection.

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

// Create table for vehicles if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS fleet_vehicles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    make VARCHAR(30) NOT NULL,
    model VARCHAR(30) NOT NULL,
    year YEAR(4) NOT NULL,
    maintenance_schedule TEXT,
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $maintenance_schedule = $_POST['maintenance_schedule'];

    // Insert data into the table
    $sql = "INSERT INTO fleet_vehicles (make, model, year, maintenance_schedule) 
            VALUES ('$make', '$model', '$year', '$maintenance_schedule')";

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
    <title>Add Vehicle to Fleet</title>
</head>
<body>

<h2>Add Vehicle to Fleet</h2>

<form method="post" action="">
    <label for="make">Make:</label><br>
    <input type="text" id="make" name="make" required><br>
    <label for="model">Model:</label><br>
    <input type="text" id="model" name="model" required><br>
    <label for="year">Year:</label><br>
    <input type="number" id="year" name="year" min="1990" max="2023" required><br>
    <label for="maintenance_schedule">Maintenance Schedule:</label><br>
    <textarea id="maintenance_schedule" name="maintenance_schedule" rows="4" cols="50" required></textarea><br>
    <input type="submit" value="Submit">
</form> 

</body>
</html>
