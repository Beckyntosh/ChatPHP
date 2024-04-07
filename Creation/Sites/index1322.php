<?php
// Establish connection to database
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
$createTableSql = "CREATE TABLE IF NOT EXISTS patients (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(255) NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_type VARCHAR(255) NOT NULL
)";

if ($conn->query($createTableSql) === TRUE) {
    // Successfully created table
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert new patient 'Jane Doe' for a dental check-up on 2023-04-15
$insertSql = "INSERT INTO patients (name, appointment_date, appointment_type) 
VALUES ('Jane Doe', '2023-04-15', 'Dental Check-up')";

if ($conn->query($insertSql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $insertSql . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Patient to Appointment System</title>
    <style>
        body {
            font-family: 'Courier New', monospace;
            background-color: #f0e6d2;
            color: #3e2723;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff8e1;
            text-align: center;
            border: 1px solid #bcaaa4;
            box-shadow: 2px 2px 12px #a1887f;
        }
        h1 {
            color: #6a4f4b;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Sherlock Holmes' Vinyl Records - Patient Management System</h1>
    <p>Patient 'Jane Doe' added for a Dental Check-up on the 15th of April, 2023.</p>
</div>

</body>
</html>
