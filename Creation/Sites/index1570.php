<?php
// This script handles both the display of the form and the form processing.

// Database configuration
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

// Function to create the necessary table if it does not exist
function createTableIfNotExists($conn) {
  $sql = "CREATE TABLE IF NOT EXISTS fleet_vehicles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    vehicle_name VARCHAR(50) NOT NULL,
    maintenance_schedule VARCHAR(100) NOT NULL,
    reg_date TIMESTAMP
  )";

  if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
  }
}

createTableIfNotExists($conn);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect post variables
  $vehicle_name = $_POST['vehicle_name'];
  $maintenance_schedule = $_POST['maintenance_schedule'];

  $sql = "INSERT INTO fleet_vehicles (vehicle_name, maintenance_schedule) VALUES (?, ?)";

  // Prepare and bind
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $vehicle_name, $maintenance_schedule);

  // Execute and check
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
<title>Add Vehicle to Fleet</title>
<style>
  body { font-family: Arial, sans-serif; }
</style>
</head>
<body>

<h2>Add Vehicle to Fleet Management</h2>

<form method="POST">
  <label for="vehicle_name">Vehicle Name:</label><br>
  <input type="text" id="vehicle_name" name="vehicle_name" value="2023 Ford Transit" required><br>
  <label for="maintenance_schedule">Maintenance Schedule:</label><br>
  <input type="text" id="maintenance_schedule" name="maintenance_schedule" value="Every 6 months" required><br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
