<?php
// Simple script to add a patient to an appointment system
// Note: This is a basic example. In a real-world scenario, you would need to implement validation, sanitation, and security measures like prepared statements.

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

// Creating table if not exists
$createPatientsTable = "CREATE TABLE IF NOT EXISTS patients (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(255) NOT NULL,
    appointment_type VARCHAR(255) NOT NULL,
    appointment_date DATETIME NOT NULL
    )";

if (!$conn->query($createPatientsTable)) {
    die("Error creating table: " . $conn->error);
}

// Adding a new patient
$name = "Jane Doe";
$appointmentType = "Dental Check-up";
$appointmentDate = date('Y-m-d H:i:s'); // Just an example; you might want to get this from a form or another input

$addPatientSQL = "INSERT INTO patients (name, appointment_type, appointment_date)
VALUES ('$name', '$appointmentType', '$appointmentDate')";

if ($conn->query($addPatientSQL) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $addPatientSQL . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Patient to Appointment System</title>
</head>
<body>
    <h2>Add New Patient</h2>
Modify the action as needed
        <label for="name">Patient Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="appointment_type">Appointment Type:</label><br>
        <input type="text" id="appointment_type" name="appointment_type" required><br>
        <label for="appointment_date">Appointment Date:</label><br>
        <input type="datetime-local" id="appointment_date" name="appointment_date" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
