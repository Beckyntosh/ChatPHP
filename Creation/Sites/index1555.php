<?php
// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vehicleName = $_POST['vehicleName'];
    $vehicleYear = $_POST['vehicleYear'];
    $maintenanceSchedule = $_POST['maintenanceSchedule'];

    // Database credentials
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

    // Create table if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS Fleet (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        vehicleName VARCHAR(50) NOT NULL,
        vehicleYear INT(4) NOT NULL,
        maintenanceSchedule TEXT,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) !== TRUE) {
        echo "Error creating table: " . $conn->error;
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO Fleet (vehicleName, vehicleYear, maintenanceSchedule) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $vehicleName, $vehicleYear, $maintenanceSchedule);

    // set parameters and execute
    if($stmt->execute()){
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Vehicle to Fleet</title>
</head>
<body>

<h2>Add a Vehicle to your Fleet</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Vehicle Name: <input type="text" name="vehicleName" required>
  <br><br>
  Vehicle Year: <input type="number" name="vehicleYear" min="1900" max="2099" step="1" required>
  <br><br>
  Maintenance Schedule (Monthly):
  <textarea name="maintenanceSchedule" rows="4" cols="40"></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>
