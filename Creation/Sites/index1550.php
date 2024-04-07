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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicleName = $_POST["vehicleName"];
    $maintenanceSchedule = $_POST["maintenanceSchedule"];

    // Prepare SQL
    $sql = "INSERT INTO fleet (vehicle_name, maintenance_schedule) VALUES (?,?)";

    // Prepare statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $vehicleName, $maintenanceSchedule);

    // Execute the query
    if ($stmt->execute() === TRUE) {
        echo "New vehicle added successfully";
    } else {
        echo "Error adding vehicle: " . $stmt->error;
    }

    $stmt->close();
}

// Create Vehicles table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS fleet (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    vehicle_name VARCHAR(50) NOT NULL,
    maintenance_schedule VARCHAR(100) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Vehicle to Fleet</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        input[type="text"], textarea { width: 100%; padding: 10px; margin: 10px 0; }
        input[type="submit"] { background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
    </style>
</head>
<body>
<div class="container">
    <h2>Add a New Vehicle to the Fleet</h2>
    <form action="" method="post">
        <label for="vehicleName">Vehicle Name:</label>
        <input type="text" id="vehicleName" name="vehicleName" placeholder="2023 Ford Transit" required>
        
        <label for="maintenanceSchedule">Maintenance Schedule:</label>
        <textarea id="maintenanceSchedule" name="maintenanceSchedule" placeholder="Every 10,000 miles" required></textarea>
        
        <input type="submit" value="Add Vehicle">
    </form>
</div>
</body>
</html>
