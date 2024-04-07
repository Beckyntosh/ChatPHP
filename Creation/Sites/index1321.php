<?php
// Set connection variables
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

// Create Table Patients if not exists
$sql = "CREATE TABLE IF NOT EXISTS Patients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullName VARCHAR(30) NOT NULL,
appointmentType VARCHAR(30) NOT NULL,
appointmentDate DATETIME NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Patients created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert new patient
$fullName = "Jane Doe";
$appointmentType = "Dental Check-up";
$appointmentDate = date("Y-m-d H:i:s");

$stmt = $conn->prepare("INSERT INTO Patients (fullName, appointmentType, appointmentDate) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $fullName, $appointmentType, $appointmentDate);

if ($stmt->execute()) {
    echo "New patient added successfully";
} else {
    echo "Error adding patient: " . $stmt->error;
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
    <h2>New Patient Appointment Form</h2>
    <form method="POST">
        <label for="fullName">Full Name:</label><br>
        <input type="text" id="fullName" name="fullName" value="Jane Doe" readonly><br>
        <label for="appointmentType">Appointment Type:</label><br>
        <input type="text" id="appointmentType" name="appointmentType" value="Dental Check-up" readonly><br>
        <label for="appointmentDate">Appointment Date and Time:</label><br>
        <input type="text" id="appointmentDate" name="appointmentDate" value="<?php echo $appointmentDate; ?>" readonly><br>
    </form>
</body>
</html>
