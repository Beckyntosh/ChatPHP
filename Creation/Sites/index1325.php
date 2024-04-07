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

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS Patients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
appointment_type VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert new patient 'Jane Doe' for a dental check-up
$sql = "INSERT INTO Patients (name, appointment_type) VALUES ('Jane Doe', 'Dental Check-up')";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;
  echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Patient</title>
<style>
body { font-family: Arial, sans-serif; }
.container { margin: 20px; }
h2 { color: green; }
</style>
</head>
<body>

<div class="container">
  <h2>Patient Appointment Booking</h2>
  <form action="" method="post">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="Jane Doe" readonly><br>
    <label for="appointment">Appointment Type:</label><br>
    <input type="text" id="appointment" name="appointment" value="Dental Check-up" readonly><br><br>
    <input type="submit" value="Add New Patient">
  </form>
</div>

</body>
</html>
