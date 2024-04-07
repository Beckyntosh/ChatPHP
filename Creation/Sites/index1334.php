<?php
// index.php - A single-file approach for demonstration purposes.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to database
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

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO patients (name, appointment_type) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $appointment_type);
    
    // Set parameters and execute
    $name = "Jane Doe";
    $appointment_type = "Dental Check-Up";
    $stmt->execute();

    echo "New patient scheduled successfully.";

    $stmt->close();
    $conn->close();
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient to Appointment System</title>
</head>
<body>
    <h2>Add Patient for an Appointment</h2>
    <form action="index.php" method="post">
Real implementation would have input fields here. For demonstration we're auto-adding Jane Doe
        <input type="submit" value="Add Jane Doe to Dental Check-Up">
    </form>
</body>
</html>
<?php
}
?>
