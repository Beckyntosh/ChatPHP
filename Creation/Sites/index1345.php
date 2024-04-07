<?php
// Database configuration
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

// Create table for patients if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS patients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
appointment VARCHAR(50) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Insert a new patient
$name = "Jane Doe";
$appointment = "Dental Check-up";

$stmt = $conn->prepare("INSERT INTO patients (name, appointment) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $appointment);

if ($stmt->execute()) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Patient to Appointment System</title>
</head>
<body>
<h2>Add Patient to Appointment System</h2>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label for="name">Patient Name:</label><br>
    <input type="text" id="name" name="name" value="Jane Doe"><br>
    <label for="appointment">Appointment:</label><br>
    <input type="text" id="appointment" name="appointment" value="Dental Check-up"><br><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>
