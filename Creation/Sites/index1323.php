<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patientName = $_POST['patientName'];
    $appointmentDate = $_POST['appointmentDate'];
    $appointmentType = $_POST['appointmentType'];

    // Database configuration
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbName = "my_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create appointment table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS appointments (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        patientName VARCHAR(30) NOT NULL,
        appointmentDate DATE NOT NULL,
        appointmentType VARCHAR(50),
        reg_date TIMESTAMP
    )";

    if (!$conn->query($sql) === TRUE) {
        echo "Error creating table: " . $conn->error;
    }

    // Insert new appointment
    $stmt = $conn->prepare("INSERT INTO appointments (patientName, appointmentDate, appointmentType) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $patientName, $appointmentDate, $appointmentType);

    if ($stmt->execute() === TRUE) {
        echo "New appointment scheduled successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Schedule a New Appointment</title>
</head>
<body style="font-family: 'Courier New', monospace;">
    <h2>Book New Appointment (Dennis Ritchie style)</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Patient Name: <input type="text" name="patientName" required><br><br>
        Appointment Date: <input type="date" name="appointmentDate" required><br><br>
        Appointment Type:
        <select name="appointmentType" required>
            <option value="Dental Check-up">Dental Check-up</option>
            <option value="General Consultation">General Consultation</option>
Add more types as needed
        </select><br><br>
        <input type="submit" value="Schedule Appointment">
    </form>  
</body>
</html>
