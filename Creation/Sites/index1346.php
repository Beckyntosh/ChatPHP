<?php
// Define MySQL connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create tables if not existing
$sqlPatientsTable = "CREATE TABLE IF NOT EXISTS Patients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(50) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$sqlAppointmentsTable = "CREATE TABLE IF NOT EXISTS Appointments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
patient_id INT(6) UNSIGNED,
appointment_date DATE NOT NULL,
appointment_time TIME NOT NULL,
description VARCHAR(100),
FOREIGN KEY (patient_id) REFERENCES Patients(id)
)";

if ($conn->query($sqlPatientsTable) !== TRUE || $conn->query($sqlAppointmentsTable) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Add a new patient 'Jane Doe' for a dental check-up
$patientName = "Jane Doe";
$patientEmail = "jane.doe@example.com";
$appointmentDate = "2023-05-15";
$appointmentTime = "10:00:00";
$description = "Dental check-up";

// Insert patient
$sqlInsertPatient = "INSERT INTO Patients (fullname, email) VALUES ('$patientName', '$patientEmail')";

if ($conn->query($sqlInsertPatient) === TRUE) {
    // Get the last inserted patient ID
    $last_patient_id = $conn->insert_id;
    
    // Insert appointment
    $sqlInsertAppointment = "INSERT INTO Appointments (patient_id, appointment_date, appointment_time, description) VALUES ($last_patient_id, '$appointmentDate', '$appointmentTime', '$description')";
    
    if ($conn->query($sqlInsertAppointment) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sqlInsertAppointment . "<br>" . $conn->error;
    }
} else {
    echo "Error: " . $sqlInsertPatient . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Appointment System</title>
</head>
<body>
    <h2>Add Patient Form</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="fullname">Full Name:</label><br>
        <input type="text" id="fullname" name="fullname" value="Jane Doe"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="jane.doe@example.com"><br>
        <label for="appointment_date">Appointment Date:</label><br>
        <input type="date" id="appointment_date" name="appointment_date" value="2023-05-15"><br>
        <label for="appointment_time">Appointment Time:</label><br>
        <input type="time" id="appointment_time" name="appointment_time" value="10:00"><br>
        <label for="description">Description:</label><br>
        <input type="text" id="description" name="description" value="Dental check-up"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
