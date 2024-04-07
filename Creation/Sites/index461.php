<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Fuel Efficiency Calculator</title>
</head>
<body>
    <h2>Vehicle Fuel Efficiency Calculator</h2>
    <form method="post">
        Distance (miles): <input type="number" name="distance" required><br>
        Fuel Efficiency (MPG): <input type="number" name="mpg" required><br>
        Fuel Price ($/gallon): <input type="number" step="0.01" name="fuel_price" required><br>
        <input type="submit" name="calculate" value="Calculate">
    </form>

    <?php
    if(isset($_POST['calculate'])) {
        $distance = $_POST['distance'];
        $mpg = $_POST['mpg'];
        $fuel_price = $_POST['fuel_price'];

        $fuel_needed = $distance / $mpg;
        $trip_cost = $fuel_needed * $fuel_price;

        echo "<br><b>Fuel Needed: </b>" . number_format($fuel_needed, 2) . " gallons<br>";
        echo "<b>Total Cost: $</b>" . number_format($trip_cost, 2);
    }

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

    // If there's no specific requirement for another table, I will proceed without creating a new one
    // But here's how you can create a table for storing calculations if needed
    $sql = "CREATE TABLE IF NOT EXISTS Trip_Calculations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    distance DOUBLE,
    mpg DOUBLE,
    fuel_price DOUBLE,
    fuel_needed DOUBLE,
    trip_cost DOUBLE,
    calculation_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        if(isset($_POST['calculate'])) {
            $stmt = $conn->prepare("INSERT INTO Trip_Calculations (distance, mpg, fuel_price, fuel_needed, trip_cost) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ddddd", $distance, $mpg, $fuel_price, $fuel_needed, $trip_cost);
            $stmt->execute();
        }
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
    ?>
</body>
</html>