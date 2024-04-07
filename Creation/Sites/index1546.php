<?php
// Database connection parameters
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

// Create Vehicle Table if it does not exist
$createTable = "CREATE TABLE IF NOT EXISTS fleet_vehicles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    vehicle_name VARCHAR(50) NOT NULL,
    vehicle_year INT(4) NOT NULL,
    maintenance_schedule TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($createTable) === TRUE) {
  // Table successfully created or exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicleName = $_POST["vehicle_name"];
    $vehicleYear = intval($_POST["vehicle_year"]);
    $maintenanceSchedule = $_POST["maintenance_schedule"];

    // Prepare SQL and bind parameters
    $stmt = $conn->prepare("INSERT INTO fleet_vehicles (vehicle_name, vehicle_year, maintenance_schedule) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $vehicleName, $vehicleYear, $maintenanceSchedule);

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
    <title>Add Vehicle to Fleet Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input, textarea {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add New Vehicle to Fleet</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="vehicle_name">Vehicle Name:</label>
        <input type="text" id="vehicle_name" name="vehicle_name" required>

        <label for="vehicle_year">Vehicle Year:</label>
        <input type="number" id="vehicle_year" name="vehicle_year" required>

        <label for="maintenance_schedule">Maintenance Schedule:</label>
        <textarea id="maintenance_schedule" name="maintenance_schedule"></textarea>

        <input type="submit" value="Add Vehicle">
    </form>
</div>

</body>
</html>
