<?php
// DISCLAIMER: This is a simplified example for educational purposes. Always secure your applications properly.
// Connect to MySQL database
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

// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["vehicle_name"])) {
  $vehicle_name = $_POST['vehicle_name'];
  $maintenance_schedule = $_POST['maintenance_schedule'];
  
  // Prepare an insert statement
  $sql = $conn->prepare("INSERT INTO vehicles (name, maintenance_schedule) VALUES (?, ?)");
  $sql->bind_param("ss", $vehicle_name, $maintenance_schedule);
  
  if($sql->execute()) {
    echo "<script>alert('Vehicle added successfully!')</script>";
  } else {
    echo "<script>alert('Error: ' . $sql . '<br>' . $conn->error')</script>";
  }
  
  $sql->close();
}

// Create vehicles table if not exists
$tableQuery = "CREATE TABLE IF NOT EXISTS vehicles (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  maintenance_schedule VARCHAR(255) NOT NULL
)";

if ($conn->query($tableQuery) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Vehicle to Fleet Management</title>
</head>
<body>

<h2>Add a New Vehicle</h2>

<form action="" method="post">
  <label for="vehicle_name">Vehicle Name:</label><br>
  <input type="text" id="vehicle_name" name="vehicle_name" value="2023 Ford Transit"><br>
  <label for="maintenance_schedule">Maintenance Schedule:</label><br>
  <input type="text" id="maintenance_schedule" name="maintenance_schedule" value="Every 5000 Miles"><br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
