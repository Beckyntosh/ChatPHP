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
$sql = "CREATE TABLE IF NOT EXISTS patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    appointment_time DATETIME NOT NULL,
    appointment_type VARCHAR(50),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

$name = "Jane Doe";
$appointment_time = "2023-04-15 10:00:00";
$appointment_type = "dental check-up";

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO patients (name, appointment_time, appointment_type) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $appointment_time, $appointment_type);

// Set parameters and execute
if ($stmt->execute()) {
  echo "New records created successfully";
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
    <form action="add_patient.php" method="post">
        <label for="name">Patient Name:</label><br>
        <input type="text" id="name" name="name" value="Jane Doe"><br>
        <label for="appointment_time">Appointment Time:</label><br>
        <input type="datetime-local" id="appointment_time" name="appointment_time" value="2023-04-15T10:00"><br>
        <label for="appointment_type">Appointment Type:</label><br>
        <select id="appointment_type" name="appointment_type">
            <option value="dental check-up">Dental Check-up</option>
            <option value="routine check-up">Routine Check-up</option>
            <option value="consultation">Consultation</option>
        </select><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
