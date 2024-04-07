<?php
// Simple environment check
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Extracting form data
    $travel = $_POST['travel'];
    $householdEnergyUse = $_POST['householdEnergyUse'];

    // Database credentials
    $servername = "db";
    $username = "root";
    $password = "root";
    $database = "my_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Save form data into the database
    $sql = "INSERT INTO carbon_footprint (travel, household_energy_use) VALUES (?, ?)";

    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $travel, $householdEnergyUse);

    if ($stmt->execute()) {
        $last_id = $stmt->insert_id;
        echo "<p>Record inserted successfully. Last inserted ID is: " . $last_id . "</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }

    $stmt->close();
    $conn->close();

    // Simple carbon footprint calculation
    $carbonFootprint = ($travel * 0.21) + ($householdEnergyUse * 1.22); // Example calculation

    echo "<p>Your estimated carbon footprint is: " . $carbonFootprint . "kg CO2</p>";
    echo "<p>Ways to reduce:</p>";
    echo "<ul>
            <li>Decrease unnecessary travel</li>
            <li>Switch to renewable energy sources</li>
          </ul>";
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carbon Footprint Calculator</title>
</head>
<body>
    <h1>Carbon Footprint Calculator</h1>
    <form action="" method="post">
        <label for="travel">Travel Emissions (in km):</label><br>
        <input type="number" id="travel" name="travel" required><br><br>
        <label for="householdEnergyUse">Household Energy Use (in kWh):</label><br>
        <input type="number" id="householdEnergyUse" name="householdEnergyUse" required><br><br>
        <input type="submit" value="Calculate">
    </form>
</body>
</html>
<?php
} // End of submit check
?>