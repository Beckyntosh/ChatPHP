<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    
    // Sanitize and prepare the data from the form
    $patientName = $conn->real_escape_string($_POST['patientName']);
    $appointmentDate = $conn->real_escape_string($_POST['appointmentDate']);
    $service = $conn->real_escape_string($_POST['service']);
    
    // SQL to insert the new patient record into the database
    $sql = "INSERT INTO appointments (patientName, appointmentDate, service) VALUES ('$patientName', '$appointmentDate', '$service')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Patient to Appointment System</title>
</head>
<body>
    <h2>Add New Patient</h2>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="patientName">Patient Name:</label><br>
        <input type="text" id="patientName" name="patientName" value="Jane Doe" required><br>
        <label for="appointmentDate">Appointment Date:</label><br>
        <input type="date" id="appointmentDate" name="appointmentDate" required><br>
        <label for="service">Service:</label><br>
        <input type="text" id="service" name="service" value="Dental Check-up" required><br><br>
        <input type="submit" value="Submit">
    </form>
    
    <?php
    // Create Tables and initial connection setup
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL to create table
    $sql = "CREATE TABLE IF NOT EXISTS appointments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    patientName VARCHAR(50) NOT NULL,
    appointmentDate DATE NOT NULL,
    service VARCHAR(100) NOT NULL,
    reg_date TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        // echo "Table appointments created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
    ?>

</body>
</html>
