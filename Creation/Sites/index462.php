<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['distance'], $_POST['fuel_price'], $_POST['efficiency'])) {
    // Connection Parameters
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    try {
        // Create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $distance = $_POST['distance'];
        $fuel_price = $_POST['fuel_price'];
        $efficiency = $_POST['efficiency'];
        $cost = ($distance / $efficiency) * $fuel_price;
        $cost = number_format($cost, 2);

        // Insert data into the database
        $sql = "INSERT INTO trip_cost (distance, fuel_price, efficiency, cost) VALUES (?, ?, ?, ?)";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$distance, $fuel_price, $efficiency, $cost]);

        echo "<p>The total cost of your trip is: $<strong>$cost</strong></p>";

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Fuel Efficiency Calculator</title>
</head>
<body>

<h2>Vehicle Fuel Efficiency Calculator</h2>

<form method="post">
  <label for="distance">Distance (in miles):</label><br>
  <input type="text" id="distance" name="distance" required><br>
  <label for="fuel_price">Fuel Price (per gallon):</label><br>
  <input type="text" id="fuel_price" name="fuel_price" required><br>
  <label for="efficiency">Fuel Efficiency (miles per gallon):</label><br>
  <input type="text" id="efficiency" name="efficiency" required><br><br>
  <input type="submit" value="Calculate">
</form>

<p>Fill in the details above to calculate the fuel cost of your trip.</p>

</body>
</html>
<?php
// Create table if not exists
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS trip_cost (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    distance FLOAT NOT NULL,
    fuel_price FLOAT NOT NULL,
    efficiency FLOAT NOT NULL,
    cost FLOAT NOT NULL,
    reg_date TIMESTAMP
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>