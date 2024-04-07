<?php
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

// Create patient table if it doesn't exist
$createTableSql = "CREATE TABLE IF NOT EXISTS patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(50) NOT NULL,
    appointment_reason VARCHAR(255) NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($createTableSql)) {
    die("Error creating table: " . $conn->error);
}

// Add a new patient
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO patients (fullname, appointment_reason) VALUES (?, ?)");
    $stmt->bind_param("ss", $patientName, $appointmentReason);

    $patientName = $_POST['fullname'];
    $appointmentReason = $_POST['appointment_reason'];
    $stmt->execute();
    $stmt->close();
    
    echo "<p>Patient added successfully</p>";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Patient</title>
</head>
<body>

<h2>Patient Registration Form</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name: <input type="text" name="fullname">
    <br><br>
    Reason for Appointment: <input type="text" name="appointment_reason">
    <br><br>
    <input type="submit" name="submit" value="Add Patient">
</form>

</body>
</html>
