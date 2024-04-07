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

// Attempt to create table if it doesn't exist
$sqlTable = "CREATE TABLE IF NOT EXISTS patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    appointment_type VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sqlTable) === TRUE) {
  echo "Table 'patients' created successfully or already exists.";
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert new patient if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $appointment_type = $_POST['appointment_type'];

    $sqlInsert = "INSERT INTO patients (fullname, appointment_type) VALUES ('$fullname', '$appointment_type')";

    if ($conn->query($sqlInsert) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sqlInsert . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add New Patient</title>
</head>
Funny style

  <h2 style="color:purple;">🦄 Add Patient to Appointment System 💎</h2>
  
  <form method="post">
    <label for="fullname">Full Name:</label><br>
    <input type="text" id="fullname" name="fullname" value="Jane Doe" style="border: 2px dashed purple;"><br>
    <label for="appointment_type">Appointment Type:</label><br>
    <input type="text" id="appointment_type" name="appointment_type" value="Dental Check-up" style="border: 2px dashed purple;"><br><br>
    <input type="submit" value="Add Patient" style="background-color: purple; color: white; border: none; cursor: grab; padding: 10px;">
  </form> 

</body>
</html>

<?php
$conn->close();
?>
