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

// sql to create table if not exists
$sqlPatients = "CREATE TABLE IF NOT EXISTS Patients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
appointment_date DATE,
appointment_time TIME,
appointment_type VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sqlPatients) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Inserting a new patient
$firstname = 'Jane';
$lastname = 'Doe';
$appointmentDate = '2023-04-01';
$appointmentTime = '10:00:00';
$appointmentType = 'Dental Check-up';

$stmt = $conn->prepare("INSERT INTO Patients (firstname, lastname, appointment_date, appointment_time, appointment_type) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $firstname, $lastname, $appointmentDate, $appointmentTime, $appointmentType);

if ($stmt->execute() === TRUE) {
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
    <h2>Add New Patient</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        First Name: <input type="text" name="firstname"><br>
        Last Name: <input type="text" name="lastname"><br>
        Appointment Date: <input type="date" name="appointment_date"><br>
        Appointment Time: <input type="time" name="appointment_time"><br>
        Appointment Type:
        <select name="appointment_type">
            <option value="Dental Check-up">Dental Check-up</option>
            <option value="General Consultation">General Consultation</option>
            <option value="Herbal Consultation">Herbal Consultation</option>
        </select>
        <br>
        <input type="submit" value="Add Patient">
    </form>
</body>
</html>
