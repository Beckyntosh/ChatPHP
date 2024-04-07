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

// Attempt to create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS Patients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(50) NOT NULL,
appointment_type VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Patients created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check for POST method to insert new patient data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $appointment_type = $_POST['appointment_type'];

    $stmt = $conn->prepare("INSERT INTO Patients (fullname, appointment_type) VALUES (?, ?)");
    $stmt->bind_param("ss", $fullname, $appointment_type);
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
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
    <h2>Add New Patient</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="fullname">Full Name:</label><br>
        <input type="text" id="fullname" name="fullname" value="Jane Doe"><br>
        <label for="appointment_type">Appointment Type:</label><br>
        <input type="text" id="appointment_type" name="appointment_type" value="Dental Check-up"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
