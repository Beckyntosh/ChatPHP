<?php
// Initialize connection variables
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

// Create vehicle table if not exists
$sql = "CREATE TABLE IF NOT EXISTS vehicles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
make VARCHAR(30) NOT NULL,
model VARCHAR(30) NOT NULL,
year YEAR(4) NOT NULL,
maintenance_schedule TEXT,
reg_date TIMESTAMP
)";

if(!$conn->query($sql)) {
  echo "Error creating table: " . $conn->error;
}

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $make = $_POST['make'] ?? '';
  $model = $_POST['model'] ?? '';
  $year = $_POST['year'] ?? '';
  $maintenance_schedule = $_POST['maintenance_schedule'] ?? '';

  // Prepare statement
  $stmt = $conn->prepare("INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssis", $make, $model, $year, $maintenance_schedule);

  // Execute statement
  if ($stmt->execute()) {
    echo "New record created successfully";
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
  <title>Add Vehicle to Fleet</title>
</head>
<body>
  <h2>Add a New Vehicle to Fleet</h2>
  <form method="POST" action="">
    Make: <input type="text" name="make" required><br><br>
    Model: <input type="text" name="model" required><br><br>
    Year: <input type="number" name="year" min="1900" max="2099" required><br><br>
    Maintenance Schedule: <textarea name="maintenance_schedule" required></textarea><br><br>
    <input type="submit" value="Add Vehicle">
  </form>
</body>
</html>
