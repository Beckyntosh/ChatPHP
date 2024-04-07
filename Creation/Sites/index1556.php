<?php
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

// If form submitted, insert values into the database.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vehicleName = $_POST['vehicleName'];
    $maintenanceDate = $_POST['maintenanceDate'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO fleet_vehicles (vehicleName, maintenanceDate) VALUES (?, ?)");
    $stmt->bind_param("ss", $vehicleName, $maintenanceDate);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Vehicle to Fleet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            margin-top: 20px;
        }

        input[type=text],
        input[type=date] {
            padding: 10px;
            margin: 10px;
            width: 200px;
        }

        input[type=submit] {
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h2>Add a new vehicle to the Fleet</h2>
    <form action="" method="post">
        <label for="vehicleName">Vehicle Name:</label><br>
        <input type="text" id="vehicleName" name="vehicleName" required placeholder="e.g., 2023 Ford Transit"><br>
        <label for="maintenanceDate">Next Maintenance Date:</label><br>
        <input type="date" id="maintenanceDate" name="maintenanceDate" required><br>
        <input type="submit" value="Add Vehicle">
    </form>
</body>

</html>
