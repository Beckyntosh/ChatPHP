<?php
// Define DB Parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$link = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Create table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS fleet_vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    make VARCHAR(50),
    model VARCHAR(50),
    year INT,
    maintenance_schedule TEXT
)";

if (!$link->query($createTable)) {
    echo "ERROR: Could not able to execute $createTable. " . mysqli_error($link);
}

// Adding a vehicle
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $maintenance_schedule = $_POST['maintenance_schedule'];

    $sql = "INSERT INTO fleet_vehicles (make, model, year, maintenance_schedule) VALUES (?, ?, ?, ?)";

    if($stmt = $link->prepare($sql)){
        $stmt->bind_param("ssis", $make, $model, $year, $maintenance_schedule);

        if($stmt->execute()){
            echo "<script>alert('Vehicle added successfully');</script>";
        } else{
            echo "Error. Please try again later.";
        }
        $stmt->close();
    }
}

// Close connection
$link->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Vehicle to Fleet</title>
</head>
<body>
    <h2>Add a New Vehicle to the Fleet</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>Make:</label>
            <input type="text" name="make" required>
        </div>
        <div>
            <label>Model:</label>
            <input type="text" name="model" required>
        </div>
        <div>
            <label>Year:</label>
            <input type="number" name="year" required>
        </div>
        <div>
            <label>Maintenance Schedule:</label>
            <textarea name="maintenance_schedule" required></textarea>
        </div>
        <div>
            <input type="submit" value="Add Vehicle">
        </div>
    </form>
</body>
</html>
