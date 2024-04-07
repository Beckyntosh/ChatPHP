<?php
// Connection parameters
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS patients (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  appointment VARCHAR(50),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Patients created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check for POST request to add a patient
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $appointment = $_POST['appointment'];
  
  $stmt = $conn->prepare("INSERT INTO patients (name, appointment) VALUES (?, ?)");
  $stmt->bind_param("ss", $name, $appointment);

  if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add New Patient</title>
</head>
<body>
<h2>Add New Patient to Appointment System</h2>

<form action="" method="post">
  <label for="name">Patient Name:</label><br>
  <input type="text" id="name" name="name" value="Jane Doe"><br>
  <label for="appointment">Appointment Details:</label><br>
  <input type="text" id="appointment" name="appointment" value="Dental Check-up"><br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>
