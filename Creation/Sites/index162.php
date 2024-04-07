<?php
// Simple Fleet Management: Add and Manage Vehicles - PHP and MySQL Example without placeholder usage

// Configuration and Database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Attempt to connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create Vehicles table if it does not exist
$tableCreateSql = "CREATE TABLE IF NOT EXISTS vehicles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
make VARCHAR(30) NOT NULL,
model VARCHAR(30) NOT NULL,
year INT(4) NOT NULL,
maintenance_schedule TEXT,
usage_tracking TEXT,
reg_date TIMESTAMP
)";

if (!$conn->query($tableCreateSql)) {
  echo "Error creating table: " . $conn->error;
}

$message = '';

// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $make = $_POST['make'];
  $model = $_POST['model'];
  $year = $_POST['year'];
  $maintenance_schedule = $_POST['maintenance_schedule'];
  $usage_tracking = $_POST['usage_tracking'];

  // Insert vehicle
  $sql = "INSERT INTO vehicles (make, model, year, maintenance_schedule, usage_tracking) VALUES ('$make', '$model', '$year', '$maintenance_schedule', '$usage_tracking')";

  if ($conn->query($sql) === TRUE) {
    $message = "Vehicle added successfully!";
  } else {
    $message = "Error adding vehicle: " . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Vehicle to Fleet Management System</title>
</head>
<body>

<h2>Add Vehicle to Fleet</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  Make: <input type="text" name="make" required><br><br>
  Model: <input type="text" name="model" required><br><br>
  Year: <input type="number" name="year" required><br><br>
  Maintenance Schedule: <textarea name="maintenance_schedule" required></textarea><br><br>
  Usage Tracking: <textarea name="usage_tracking" required></textarea><br><br>
  <input type="submit" value="Add Vehicle">
</form>

<?php if ($message) echo "<p>$message</p>"; ?>

</body>
</html>