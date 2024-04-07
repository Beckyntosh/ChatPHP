<?php
// Establish database connection 
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

// Create table if it does not exist
$query = "CREATE TABLE IF NOT EXISTS energy_usage (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
electricity_usage DECIMAL(10,2),
gas_usage DECIMAL(10,2),
water_usage DECIMAL(10,2),
cost_estimate DECIMAL(10,2),
reg_date TIMESTAMP
)";

if ($conn->query($query) === TRUE) {
  //echo "Table energy_usage created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $electricity_usage = $_POST['electricity_usage'];
    $gas_usage = $_POST['gas_usage'];
    $water_usage = $_POST['water_usage'];

    // Example calculation
    $cost_estimate = ($electricity_usage * 0.13) + ($gas_usage * 0.09) + ($water_usage * 0.004); // Simplified cost estimation

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO energy_usage (electricity_usage, gas_usage, water_usage, cost_estimate) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("dddd", $electricity_usage, $gas_usage, $water_usage, $cost_estimate);

    if ($stmt->execute()) {
        $saved = true;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home Energy Use Calculator</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        .form-group { margin-bottom: 1em; }
        label { display: block; margin-bottom: .5em; }
        input[type="number"] { width: 100%; padding: 8px; }
        input[type="submit"] { background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
    </style>
</head>
<body>
<div class="container">
    <h2>Home Energy Use Calculator</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="electricity_usage">Electricity usage (kWh):</label>
            <input type="number" id="electricity_usage" name="electricity_usage" required>
        </div>
        <div class="form-group">
            <label for="gas_usage">Gas usage (therms):</label>
            <input type="number" id="gas_usage" name="gas_usage" required>
        </div>
        <div class="form-group">
            <label for="water_usage">Water usage (gallons):</label>
            <input type="number" id="water_usage" name="water_usage" required>
        </div>
        <input type="submit" value="Calculate">
    </form>
    <?php
    if (isset($saved) && $saved) {
        echo "<p>Your estimated monthly energy cost: <strong>$". number_format($cost_estimate, 2) ."</strong></p>";
        echo "<p>Tip: Reducing your shower time and unplugging devices can significantly decrease your bills.</p>";
    }
    ?>
</div>
</body>
</html>