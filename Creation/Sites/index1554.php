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

// Create vehicle table if it does not exist
$sqlVehicleTable = "CREATE TABLE IF NOT EXISTS vehicles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
make VARCHAR(30) NOT NULL,
model VARCHAR(30) NOT NULL,
year YEAR(4) NOT NULL,
maintenance_schedule VARCHAR(255),
reg_date TIMESTAMP
)";

if ($conn->query($sqlVehicleTable) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// PHP code to add a vehicle
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $make = $_POST['make'];
  $model = $_POST['model'];
  $year = $_POST['year'];
  $maintenance_schedule = $_POST['maintenance_schedule'];
  
  $sqlInsertVehicle = "INSERT INTO vehicles (make, model, year, maintenance_schedule)
  VALUES ('$make', '$model', '$year', '$maintenance_schedule')";

  if ($conn->query($sqlInsertVehicle) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sqlInsertVehicle . "<br>" . $conn->error;
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Vehicle to Fleet</title>
</head>
<body>
    <h2>Add Vehicle to Fleet</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Make: <input type="text" name="make" required>
        Model: <input type="text" name="model" required>
        Year: <input type="number" name="year" min="1900" max="2099" step="1" required>
        Maintenance Schedule: <textarea name="maintenance_schedule" required></textarea>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
