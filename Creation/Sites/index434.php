<?php
// Establish connection to the database
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

// Create tables if they don't exist
$travelTable = "CREATE TABLE IF NOT EXISTS travel_footprint (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
transport_mode VARCHAR(30) NOT NULL,
distance FLOAT NOT NULL,
carbon_footprint FLOAT NOT NULL,
reg_date TIMESTAMP
)";

$householdTable = "CREATE TABLE IF NOT EXISTS household_footprint (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
energy_consumption FLOAT NOT NULL,
carbon_footprint FLOAT NOT NULL,
reg_date TIMESTAMP
)";

$conn->query($travelTable);
$conn->query($householdTable);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Calculate and save the footprint details
  if (isset($_POST['transport_mode'], $_POST['distance'])) {
    // Calculate travel footprint
    $transport_mode = $_POST['transport_mode'];
    $distance = (float)$_POST['distance'];
    $carbon_footprint = $distance * 0.21; // assuming 0.21kg CO2 per mile as average
    
    $stmt = $conn->prepare("INSERT INTO travel_footprint (transport_mode, distance, carbon_footprint) VALUES (?, ?, ?)");
    $stmt->bind_param("sdd", $transport_mode, $distance, $carbon_footprint);
    $stmt->execute();
    
    echo "<script>alert('Travel footprint added successfully!')</script>";
  }

  if (isset($_POST['energy_consumption'])) {
    // Calculate household energy footprint
    $energy_consumption = (float)$_POST['energy_consumption'];
    $carbon_footprint = $energy_consumption * 0.23314; // assuming 0.23314 kg CO2 per kWh
    
    $stmt = $conn->prepare("INSERT INTO household_footprint (energy_consumption, carbon_footprint) VALUES (?, ?)");
    $stmt->bind_param("dd", $energy_consumption, $carbon_footprint);
    $stmt->execute();
    
    echo "<script>alert('Household footprint added successfully!')</script>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Carbon Footprint Calculator</title>
</head>
<body>
<h2>Carbon Footprint Calculator</h2>

<form method="post">
  <h3>Travel Footprint</h3>
  <label for="transport_mode">Transport Mode:</label><br>
  <input type="text" id="transport_mode" name="transport_mode" required><br>
  <label for="distance">Distance (in miles):</label><br>
  <input type="number" id="distance" name="distance" step="0.01" required><br>
  <h3>Household Footprint</h3>
  <label for="energy_consumption">Monthly Energy Consumption (in kWh):</label><br>
  <input type="number" id="energy_consumption" name="energy_consumption" step="0.01" required><br><br>
  <input type="submit" value="Calculate and Save">
</form>

</body>
</html>
<?php
$conn->close();
?>