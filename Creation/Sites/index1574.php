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

    // Check if form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addVehicle"])) {
        // Retrieve inputs
        $vehicleModel = $_POST['vehicleModel'];
        $maintenanceDate = $_POST['maintenanceDate'];

        // Prepare SQL query
        $sql = "INSERT INTO fleet_vehicles (model, maintenance_schedule) VALUES (?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $vehicleModel, $maintenanceDate);

        if ($stmt->execute()) {
            echo "New vehicle added successfully";
        } else {
            echo "Error adding vehicle: " . $conn->error;
        }

        $stmt->close();
    }

    // Create Vehicles Table if it doesn't exist
    $createTableSQL = "CREATE TABLE IF NOT EXISTS fleet_vehicles (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        model VARCHAR(30) NOT NULL,
        maintenance_schedule DATE NOT NULL
    )";
    
    if (!$conn->query($createTableSQL)) {
        echo "Error creating table: " . $conn->error;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Vehicle to Fleet Management</title>
</head>
<body>
    <h2>Add a Vehicle to Your Fleet</h2>
    <form method="POST" action="">
        <label for="vehicleModel">Vehicle Model:</label>
        <input type="text" id="vehicleModel" name="vehicleModel" required placeholder="e.g., 2023 Ford Transit"><br><br>
        
        <label for="maintenanceDate">Next Maintenance Date:</label>
        <input type="date" id="maintenanceDate" name="maintenanceDate" required><br><br>
        
        <button type="submit" name="addVehicle">Add Vehicle</button>
    </form>
</body>
</html>
<?php
    $conn->close();
?>
