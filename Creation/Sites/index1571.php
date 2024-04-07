<?php
// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Create table for vehicles if it doesn't exist
$createQuery = "CREATE TABLE IF NOT EXISTS fleet_vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    model VARCHAR(255) NOT NULL,
    year YEAR(4),
    maintenance_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

if (!$conn->query($createQuery)) {
    die("Error creating table: " . $conn->error);
}

// Check for POST request to add new vehicle
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["model"], $_POST["year"], $_POST["maintenance_date"])) {
    $model = $conn->real_escape_string($_POST["model"]);
    $year = intval($_POST["year"]);
    $maintenance_date = $conn->real_escape_string($_POST["maintenance_date"]);

    $insertQuery = "INSERT INTO fleet_vehicles (model, year, maintenance_date) VALUES (?, ?, ?);";
    
    // Prepare and bind
    if ($stmt = $conn->prepare($insertQuery)) {
        $stmt->bind_param("sis", $model, $year, $maintenance_date);
        if ($stmt->execute()) {
            echo "<script>alert('Vehicle added successfully!');</script>";
        } else {
            echo "<script>alert('Error adding vehicle.');</script>";
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vehicle to Fleet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-weight: bold;
        }
        form {
            display: flex;
            flex-direction: column;
            max-width: 300px;
            margin: 0 auto;
        }
        label, input {
            margin: 10px 0;
        }
        button {
            background-color: #000;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #444;
        }
    </style>
</head>
<body>
    <h2>Add New Vehicle to Fleet Management</h2>
    <form method="POST" action="">
        <label for="model">Model:</label>
        <input type="text" id="model" name="model" required>
        
        <label for="year">Year:</label>
        <input type="number" id="year" name="year" required>
        
        <label for="maintenance_date">Maintenance Date:</label>
        <input type="date" id="maintenance_date" name="maintenance_date" required>
        
        <button type="submit">Add Vehicle</button>
    </form>
</body>
</html>
