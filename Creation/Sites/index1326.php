<?php
// Setup connection parameters
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
$patientTable = "CREATE TABLE IF NOT EXISTS patients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
appointment_date DATE NOT NULL,
reg_date TIMESTAMP
)";

$appoinmentTable = "CREATE TABLE IF NOT EXISTS appointments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
patient_id INT(6) UNSIGNED,
appointment_type VARCHAR(50),
FOREIGN KEY (patient_id) REFERENCES patients(id)
)";

if ($conn->query($patientTable) === TRUE && $conn->query($appoinmentTable) === TRUE) {
  echo "Tables created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $appointment_date = $_POST['appointment_date'];
  $appointment_type = $_POST['appointment_type'];
  
  // Insert patient
  $insertPatient = "INSERT INTO patients (firstname, lastname, appointment_date) VALUES ('$firstname', '$lastname', '$appointment_date')";
  
  if ($conn->query($insertPatient) === TRUE) {
    $last_id = $conn->insert_id;
    $insertAppointment = "INSERT INTO appointments (patient_id, appointment_type) VALUES ('$last_id', '$appointment_type')";

    if ($conn->query($insertAppointment) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $insertAppointment . "<br>" . $conn->error;
    }
    
  } else {
    echo "Error: " . $insertPatient . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Patient to Appointment System</title>
</head>
<body>

<h2>Add Patient For a Dental Check-Up</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="firstname">First Name</label><br>
  <input type="text" id="firstname" name="firstname" required><br>
  <label for="lastname">Last Name</label><br>
  <input type="text" id="lastname" name="lastname" required><br>
  <label for="appointment_date">Date of Appointment</label><br>
  <input type="date" id="appointment_date" name="appointment_date" required><br>
  <label for="appointment_type">Type of Appointment</label><br>
  <input type="text" id="appointment_type" name="appointment_type" required><br><br>
  <input type="submit" value="Add Patient">
</form>

</body>
</html>
