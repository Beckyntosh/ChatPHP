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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS fleet (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
vehicle_name VARCHAR(30) NOT NULL,
maintenance_schedule DATE NOT NULL,
reg_date TIMESTAMP
)";

// Execute query
if ($conn->query($sql) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicleName = $_POST['vehicleName'];
    $maintenanceSchedule = $_POST['maintenanceSchedule'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO fleet (vehicle_name, maintenance_schedule) VALUES (?, ?)");
    $stmt->bind_param("ss", $vehicleName, $maintenanceSchedule);

    // Execute and check
    if ($stmt->execute() === TRUE) {
        echo "New vehicle added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Vehicle to Fleet Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #222;
            color: #ddd;
        }
        .container {
            width: 80%;
            margin: auto;
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
        }
        input[type=text], input[type=date] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
  <h2>Add Vehicle to Fleet Management</h2>
  <form action="" method="post">
    <label for="vehicleName">Vehicle Name:</label>
    <input type="text" id="vehicleName" name="vehicleName" placeholder="e.g., 2023 Ford Transit" required>
    
    <label for="maintenanceSchedule">Maintenance Schedule:</label>
    <input type="date" id="maintenanceSchedule" name="maintenanceSchedule" required>
    
    <input type="submit" value="Add Vehicle">
  </form>
</div>

</body>
</html>
