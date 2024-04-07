<?php
// Initialize the connection parameters for MySQL
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

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicleName = $_POST['vehicleName'];
    $maintenanceSchedule = $_POST['maintenanceSchedule'];
    
    // Prepare SQL to insert new vehicle
    $sql = "INSERT INTO FleetVehicles (vehicleName, maintenanceSchedule) VALUES (?, ?)";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("ss", $vehicleName, $maintenanceSchedule);
    
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Create table FleetVehicles if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS FleetVehicles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
vehicleName VARCHAR(50) NOT NULL,
maintenanceSchedule VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    // echo "Table FleetVehicles created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Vehicle to Fleet Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            text-align: center;
        }
        form {
            background-color: #fff;
            margin: 50px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px 0 rgba(0,0,0,0.1);
            display: inline-block;
        }
        input[type="text"], input[type="submit"] {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h2>Add a New Vehicle to Your Fleet</h2>
    <form action="" method="post">
        <label for="vehicleName">Vehicle Name:</label><br>
        <input type="text" id="vehicleName" name="vehicleName" value="2023 Ford Transit"><br>
        <label for="maintenanceSchedule">Maintenance Schedule:</label><br>
        <input type="text" id="maintenanceSchedule" name="maintenanceSchedule" value="Every 10,000 miles"><br>
        <input type="submit" value="Add Vehicle">
    </form>
</body>
</html>

<?php
$conn->close();
?>
