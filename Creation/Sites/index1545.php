<?php
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

// Create vehicles table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS vehicles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    make VARCHAR(30) NOT NULL,
    model VARCHAR(30) NOT NULL,
    year YEAR(4) NOT NULL,
    maintenance_schedule TEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table vehicles created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $make = $_POST['make'];
  $model = $_POST['model'];
  $year = $_POST['year'];
  $maintenance_schedule = $_POST['maintenance_schedule'];
  
  $sql = "INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES ('$make', '$model', '$year', '$maintenance_schedule')";
  
  if ($conn->query($sql) === TRUE) {
    echo "New vehicle added successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Vehicle to Fleet</title>
</head>
<body>

<h2>Add a New Vehicle to the Fleet</h2>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  Make: <input type="text" name="make" required><br>
  Model: <input type="text" name="model" required><br>
  Year: <input type="number" name="year" min="1900" max="2099" step="1" required><br>
  Maintenance Schedule: <textarea name="maintenance_schedule" cols="40" rows="5" required></textarea><br>
  <input type="submit" value="Add Vehicle">
</form>

</body>
</html>
