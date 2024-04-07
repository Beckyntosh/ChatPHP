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

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS Patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    appointment_date DATETIME NOT NULL,
    reason VARCHAR(255),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

$name = "Jane Doe";
$appointment_date = date("Y-m-d H:i:s", strtotime("+1 week")); // Set appointment 1 week from now
$reason = "Dental Check-up";

// Insert new patient
$sql = "INSERT INTO Patients (name, appointment_date, reason)
VALUES ('$name', '$appointment_date', '$reason')";

if ($conn->query($sql) === TRUE) {
  // New record created successfully
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            color: #333;
        }

        .success {
            color: green;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add Patient</h2>
    <p class="success">Patient 'Jane Doe' has been scheduled for a dental check-up.</p>
</div>

</body>
</html>
