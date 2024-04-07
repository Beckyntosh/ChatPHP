<?php
// Define MySQL connection parameters
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

// Create table for vehicles if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS vehicles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    vehicle_name VARCHAR(50) NOT NULL,
    maintenance_schedule DATE NOT NULL,
    reg_date TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
  // Table creation success or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicleName = $_POST['vehicleName'];
    $maintenanceSchedule = $_POST['maintenanceSchedule'];

    // Insert vehicle into database
    $stmt = $conn->prepare("INSERT INTO vehicles (vehicle_name, maintenance_schedule) VALUES (?, ?)");
    $stmt->bind_param("ss", $vehicleName, $maintenanceSchedule);

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Vehicle to Fleet - Vitamins Website</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #0a0f0d;
            color: #c0d8d2;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        input[type=text], input[type=date] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color: #8f9292;
            color: black;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Add Vehicle to Fleet Management</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="vehicleName">Vehicle Name:</label>
        <input type="text" id="vehicleName" name="vehicleName" placeholder="2023 Ford Transit" required>

        <label for="maintenanceSchedule">Maintenance Schedule:</label>
        <input type="date" id="maintenanceSchedule" name="maintenanceSchedule" required>
        
        <button type="submit">Add Vehicle</button>
    </form>
</div>
</body>
</html>
