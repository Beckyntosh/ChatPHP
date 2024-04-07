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

// Creating a table for fleet vehicles if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS fleet_vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicle_name VARCHAR(255) NOT NULL,
    model_year YEAR NOT NULL,
    maintenance_schedule TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// HTML Form for adding a new vehicle
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vehicle to Fleet</title>
</head>
<body>
    <h2>Add New Vehicle</h2>
    <form method="post">
        Vehicle Name: <input type="text" name="vehicle_name" required>
        Model Year: <input type="number" name="model_year" required>
        Maintenance Schedule: <textarea name="maintenance_schedule" required></textarea>
        <input type="submit" name="submit" value="Add Vehicle">
    </form>
<?php
// Inserting a new vehicle into the database
if (isset($_POST['submit'])) {
    $vehicle_name = $conn->real_escape_string($_POST['vehicle_name']);
    $model_year = $conn->real_escape_string($_POST['model_year']);
    $maintenance_schedule = $conn->real_escape_string($_POST['maintenance_schedule']);

    $insertSql = "INSERT INTO fleet_vehicles (vehicle_name, model_year, maintenance_schedule) VALUES ('$vehicle_name', '$model_year', '$maintenance_schedule')";

    if ($conn->query($insertSql) === TRUE) {
        echo "<p>New vehicle added successfully.</p>";
    } else {
        echo "<p>Error: " . $insertSql . "<br>" . $conn->error . "</p>";
    }
}

$conn->close();
?>
</body>
</html>
