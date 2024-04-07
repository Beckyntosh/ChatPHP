<?php
// Set up database connection
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

// Create tables if not exists
$tablesSql = "CREATE TABLE IF NOT EXISTS user_footprints (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    travel_emissions FLOAT NOT NULL,
    household_emissions FLOAT NOT NULL,
    suggestions TEXT NOT NULL,
    reg_date TIMESTAMP
)";

if (!$conn->query($tablesSql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $travelEmissions = $_POST['travel_emissions'];
    $householdEmissions = $_POST['household_emissions'];
    $suggestions = "Consider using public transportation, Reduce energy consumption at home.";

    $stmt = $conn->prepare("INSERT INTO user_footprints (travel_emissions, household_emissions, suggestions) VALUES (?, ?, ?)");
    $stmt->bind_param("dds", $travelEmissions, $householdEmissions, $suggestions);

    if ($stmt->execute() === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error inserting record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Carbon Footprint Calculator</title>
    <style>
        body { font-family: 'Courier New', Courier, monospace; }
        .container { width: 80%; margin: auto; }
        input[type=text], input[type=number] { width: 100%; }
        input[type=submit] { padding: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Carbon Footprint Calculator for Pet Supplies</h2>
        <form method="post" action="">
            <label for="travel_emissions">Travel Emissions (kg CO2/year):</label><br>
            <input type="number" step="0.01" id="travel_emissions" name="travel_emissions" required><br>
            <label for="household_emissions">Household Emissions (kg CO2/year):</label><br>
            <input type="number" step="0.01" id="household_emissions" name="household_emissions" required><br><br>
            <input type="submit" value="Calculate">
        </form>
    </div>
</body>
</html>