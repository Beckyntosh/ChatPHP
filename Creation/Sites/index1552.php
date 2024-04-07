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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS Fleet (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
vehicle_name VARCHAR(50) NOT NULL,
maintenance_schedule VARCHAR(100) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicle_name = $_POST["vehicle_name"];
    $maintenance_schedule = $_POST["maintenance_schedule"];

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO Fleet (vehicle_name, maintenance_schedule) VALUES (?, ?)");
    $stmt->bind_param("ss", $vehicle_name, $maintenance_schedule);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
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
        .container { max-width: 600px; margin: 20px auto; padding: 20px; }
        form { display: grid; grid-gap: 10px; }
        label, input, button { padding: 10px; }
        button { background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add a New Vehicle to Fleet</h2>
        <form method="post">
            <label for="vehicle_name">Vehicle Name:</label>
            <input type="text" id="vehicle_name" name="vehicle_name" placeholder="e.g., 2023 Ford Transit" required>
            <label for="maintenance_schedule">Maintenance Schedule:</label>
            <input type="text" id="maintenance_schedule" name="maintenance_schedule" placeholder="e.g., Every 6 Months" required>
            <button type="submit">Add Vehicle</button>
        </form>
    </div>
</body>
</html>
