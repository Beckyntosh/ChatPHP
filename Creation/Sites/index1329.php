<?php
// This script will handle the addition of a new patient to the appointments system
// It's a simplified example for educational purposes

// Database credentials
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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patientName = $_POST['patientName'];
    $appointmentType = $_POST['appointmentType'];
    $appointmentDate = $_POST['appointmentDate'];

    // SQL to add a new patient to the appointment system
    $sql = "INSERT INTO appointments (patient_name, appointment_type, appointment_date)
    VALUES ('$patientName', '$appointmentType', '$appointmentDate')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
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
    <title>Add Patient to Appointment System</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; }
        input[type=text], input[type=date] { width: 100%; padding: 10px; margin: 10px 0; }
        input[type=submit] { background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="container">
    <h2>Add New Patient to Appointments</h2>
    <form method="POST" action="">
        <label for="patientName">Patient Name:</label>
        <input type="text" id="patientName" name="patientName" value="Jane Doe" required>

        <label for="appointmentType">Appointment Type:</label>
        <input type="text" id="appointmentType" name="appointmentType" value="Dental Check-up" required>

        <label for="appointmentDate">Appointment Date:</label>
        <input type="date" id="appointmentDate" name="appointmentDate" required>
        
        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
