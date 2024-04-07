<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database configuration
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    try {
        // Create database connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL and bind parameters
        $stmt = $conn->prepare("INSERT INTO fleet_vehicles (vehicle_name, maintenance_schedule) VALUES (:vehicle_name, :maintenance_schedule)");
        $stmt->bindParam(':vehicle_name', $vehicle_name);
        $stmt->bindParam(':maintenance_schedule', $maintenance_schedule);

        // Insert a vehicle
        $vehicle_name = "2023 Ford Transit";
        $maintenance_schedule = date("Y-m-d", strtotime("+30 days")); // Example maintenance schedule
        $stmt->execute();

        echo "New record created successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Vehicle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        input[type="text"], input[type="submit"] {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            display: block;
            width: 100%;
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
    <h2>Add a New Vehicle to the Fleet</h2>
    <form method="post">
        <input type="text" name="vehicle_name" placeholder="Vehicle Name" required>
        <input type="text" name="maintenance_schedule" placeholder="Maintenance Schedule YYYY-MM-DD" required>
        <input type="submit" value="Add Vehicle">
    </form>
</div>

</body>
</html>
<?php
}
?>
