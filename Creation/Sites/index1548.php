<?php

$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS Fleet (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
vehicle_name VARCHAR(50) NOT NULL,
maintenance_schedule DATE NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table Fleet created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Post request handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $vehicle_name = $_POST['vehicle_name'];
  $maintenance_schedule = $_POST['maintenance_schedule'];

  $stmt = $conn->prepare("INSERT INTO Fleet (vehicle_name, maintenance_schedule) VALUES (?, ?)");
  $stmt->bind_param("ss", $vehicle_name, $maintenance_schedule);

  if ($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Vehicle to Fleet Management</title>
</head>
<body>

<h2>Add Vehicle to Fleet</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Vehicle Name: <input type="text" name="vehicle_name" required>
  <br><br>
  Maintenance Schedule: <input type="date" name="maintenance_schedule" required>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>
