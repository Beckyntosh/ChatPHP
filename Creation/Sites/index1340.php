<?php
// Database connection
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
$sql = "CREATE TABLE IF NOT EXISTS patients (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  appointment VARCHAR(100) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $appointment = $_POST['appointment'];

  // Insert new patient
  $sql = "INSERT INTO patients (name, appointment) VALUES (?, ?)";

  $stmt = $conn->prepare($sql);
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
<html>
<head>
    <title>Appointment System</title>
</head>
<body>
    <h2>Add Patient to Appointment System</h2>
    <form action="" method="post">
        <label for="name">Patient Name:</label><br>
        <input type="text" id="name" name="name" value="Jane Doe"><br>
        <label for="appointment">Appointment:</label><br>
        <input type="text" id="appointment" name="appointment" value="Dental Check-Up"><br><br>
        <input type="submit" value="Add Patient">
    </form>
</body>
</html>
