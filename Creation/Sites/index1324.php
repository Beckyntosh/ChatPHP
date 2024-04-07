<?php
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
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

    // Sanitize user input
    $patientName = $_POST['patientName'] ? $conn->real_escape_string($_POST['patientName']) : '';
    $appointmentTime = $_POST['appointmentTime'] ? $conn->real_escape_string($_POST['appointmentTime']) : '';
    $appointmentType = $_POST['appointmentType'] ? $conn->real_escape_string($_POST['appointmentType']) : '';

    // SQL query to add a new patient and their appointment details
    $sql = "INSERT INTO Patients (Name, AppointmentTime, AppointmentType) VALUES ('$patientName', '$appointmentTime', '$appointmentType')";
    
    // Attempt to execute the prepared statement
    if($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Patient Appointment</title>
</head>
<body>

<h2>Add Patient Appointment Form</h2>

<form method="post" action="">
    <label for="patientName">Patient Name:</label>
    <input type="text" id="patientName" name="patientName"><br><br>

    <label for="appointmentTime">Appointment Time:</label>
    <input type="datetime-local" id="appointmentTime" name="appointmentTime"><br><br>

    <label for="appointmentType">Appointment Type:</label>
    <select id="appointmentType" name="appointmentType">
        <option value="General Checkup">General Checkup</option>
        <option value="Dental Checkup">Dental Checkup</option>
    </select><br><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>
