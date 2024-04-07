<?php
// Database Configuration
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

// Check if the table exists, and if not, create it
$checkTable = "SELECT 1 FROM `vehicle_efficiency` LIMIT 1";
if($conn->query($checkTable) === FALSE) {
    $createTable = "CREATE TABLE vehicle_efficiency (
                      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                      vehicle_model VARCHAR(50) NOT NULL,
                      fuel_efficiency FLOAT NOT NULL,
                      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                    )";

    if ($conn->query($createTable) !== TRUE) {
        die("Error creating table: " . $conn->error);
    }
}

$message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $vehicle_model = $_POST['vehicle_model'];
  $fuel_efficiency = $_POST['fuel_efficiency'];

  $sql = "INSERT INTO vehicle_efficiency (vehicle_model, fuel_efficiency)
          VALUES ('$vehicle_model', '$fuel_efficiency')";

  if ($conn->query($sql) === TRUE) {
    $message = "New record created successfully";
  } else {
    $message = "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Fuel Efficiency Calculator</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        form { margin-top: 20px; }
        input, button { width: 100%; padding: 10px; margin: 5px 0; }
    </style>
</head>
<body>

<div class="container">
    <h2>Vehicle Fuel Efficiency and Trip Cost Calculator</h2>
    <p><?php echo $message; ?></p>
    <form action="" method="post">
        <input type="text" name="vehicle_model" placeholder="Vehicle Model" required>
        <input type="number" step="0.01" name="fuel_efficiency" placeholder="Fuel Efficiency (miles per gallon)" required>
        <button type="submit">Save Vehicle Efficiency</button>
    </form>

    <form id="calcForm">
        <input type="number" id="distance" placeholder="Distance (miles)" required>
        <input type="number" step="0.01" id="fuelPrice" placeholder="Fuel Price per Gallon ($)" required>
        <button type="button" onclick="calculateCost()">Calculate Trip Cost</button>
    </form>

    <div id="result"></div>
</div>

<script>
function calculateCost() {
    var distance = document.getElementById('distance').value;
    var fuelPrice = document.getElementById('fuelPrice').value;
    var fuelEfficiency = document.getElementById('fuel_efficiency').value;

    var cost = (distance / fuelEfficiency) * fuelPrice;
    document.getElementById('result').innerHTML = `Estimated Trip Cost: $${cost.toFixed(2)}`;
}
</script>

</body>
</html>