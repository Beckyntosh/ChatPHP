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
$sql = "CREATE TABLE IF NOT EXISTS Patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    appointment VARCHAR(50),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check for POST request to add patient
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fullname'];
    $appointment = $_POST['appointment'];

    $stmt = $conn->prepare("INSERT INTO Patients (fullname, appointment) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $appointment);

    if ($stmt->execute()) {
        echo "New patient added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Patient to Appointment System</title>
</head>
<body>
    <h2>Add a New Patient</h2>
    <form method="POST" action="">
        <label for="fullname">Full Name:</label><br>
        <input type="text" id="fullname" name="fullname" value="Jane Doe"><br>
        <label for="appointment">Appointment:</label><br>
        <input type="text" id="appointment" name="appointment" value="Dental Check-up"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
