<?php
// Simple fleet management system for adding a vehicle to a database.

// Connect to the database
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

// Create table vehicles if it does not exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS vehicles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    make VARCHAR(30) NOT NULL,
    model VARCHAR(30) NOT NULL,
    year YEAR(4),
    maintenance_schedule VARCHAR(255),
    reg_date TIMESTAMP
)";
if ($conn->query($tableCreationQuery) === TRUE) {
    echo "Table vehicles created successfully or already exists.<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect value of input field
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $maintenance_schedule = $_POST['maintenance_schedule'];

    $insertQuery = "INSERT INTO vehicles (make, model, year, maintenance_schedule)
    VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ssis", $make, $model, $year, $maintenance_schedule);
    
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Vehicle to Fleet Management</title>
    <style>
        body { font-family: 'Courier New', monospace; }
        form { margin: 20px; }
        input, button { font-family: 'Courier New', monospace; margin: 5px; }
    </style>
</head>
<body>

<h2>Add a New Vehicle to Fleet Management</h2>

<form action="" method="post">
    <label for="make">Make:</label><br>
    <input type="text" id="make" name="make" value="Ford"><br>
    <label for="model">Model:</label><br>
    <input type="text" id="model" name="model" value="Transit"><br>
    <label for="year">Year:</label><br>
    <input type="number" id="year" name="year" value="2023"><br>
    <label for="maintenance_schedule">Maintenance Schedule:</label><br>
    <input type="text" id="maintenance_schedule" name="maintenance_schedule" value="Every 10,000 miles or annually"><br><br>
    <button type="submit">Add Vehicle</button>
</form>

</body>
</html>
