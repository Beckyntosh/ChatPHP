<?php
// Simple Fleet Management: Add Vehicle Feature

// Database Connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Check POST Request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicleModel = $_POST['vehicleModel'];
    $maintenanceDate = $_POST['maintenanceDate'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO fleet_vehicles (model, next_maintenance) VALUES ('$vehicleModel', '$maintenanceDate')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Vehicle to Fleet</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 500px; margin: auto; padding: 20px; }
        label, input { display: block; margin-bottom: 10px; }
        input[type=text], input[type=date] { width: 100%; padding: 8px; }
        input[type=submit] { background-color: #4CAF50; color: white; padding: 10px; border: none; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="container">
    <h2>Add a New Vehicle to Fleet</h2>
    <form action="" method="post">
        <label for="vehicleModel">Vehicle Model:</label>
        <input type="text" id="vehicleModel" name="vehicleModel" required>

        <label for="maintenanceDate">Next Maintenance Date:</label>
        <input type="date" id="maintenanceDate" name="maintenanceDate" required>

        <input type="submit" value="Add Vehicle">
    </form>
</div>

</body>
</html>

<?php
// Create table if not exists
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create table
$sql = "CREATE TABLE IF NOT EXISTS fleet_vehicles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
model VARCHAR(30) NOT NULL,
next_maintenance DATE NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
