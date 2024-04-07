<?php
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
$sql = "CREATE TABLE IF NOT EXISTS FleetVehicles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
vehicle_name VARCHAR(50) NOT NULL,
maintenance_schedule DATE NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table FleetVehicles created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check for POST request to add vehicle
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicle_name = $_POST['vehicle_name'];
    $maintenance_schedule = $_POST['maintenance_schedule'];

    $stmt = $conn->prepare("INSERT INTO FleetVehicles (vehicle_name, maintenance_schedule) VALUES (?, ?)");
    $stmt->bind_param("ss", $vehicle_name, $maintenance_schedule);

    if ($stmt->execute() === TRUE) {
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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Vehicle to Fleet</title>
</head>
<body>

<h2>Add a new Vehicle to Fleet Management</h2>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="vehicle_name">Vehicle Name:</label><br>
  <input type="text" id="vehicle_name" name="vehicle_name" value="2023 Ford Transit"><br>
  <label for="maintenance_schedule">Maintenance Schedule (YYYY-MM-DD):</label><br>
  <input type="date" id="maintenance_schedule" name="maintenance_schedule" value="<?php echo date('Y-m-d'); ?>"><br><br>
  <input type="submit" value="Add Vehicle">
</form> 

</body>
</html>
