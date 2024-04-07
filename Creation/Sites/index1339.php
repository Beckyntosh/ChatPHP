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

// Create table if not exists
$table_sql = "CREATE TABLE IF NOT EXISTS Patients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(30) NOT NULL,
appointment_type VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
  echo ""; // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Add new patient 'Jane Doe' for a dental check-up
$name = "Jane Doe";
$appointment_type = "Dental Check-Up";

$stmt = $conn->prepare("INSERT INTO Patients (fullname, appointment_type) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $appointment_type);

if ($stmt->execute()) {
  echo ""; // New record created successfully
} else {
  echo "Error: " . $stmt->error;
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
<h2>Add New Patient</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<label for="fullname">Full Name:</label><br>
<input type="text" id="fullname" name="fullname" value="Jane Doe"><br>
<label for="appointment_type">Appointment Type:</label><br>
<input type="text" id="appointment_type" name="appointment_type" value="Dental Check-Up"><br><br>
<input type="submit" value="Add Patient">
</form>
</body>
</html>
