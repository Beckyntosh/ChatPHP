<?php
// Create connection
$conn = new mysqli('db', 'root', 'root', 'my_database');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create table
$sql_patients = "CREATE TABLE IF NOT EXISTS patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    appointment_type VARCHAR(50),
    reg_date TIMESTAMP
)";

if ($conn->query($sql_patients) === TRUE) {
    echo "Table Patients created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$name = 'Jane Doe';
$appointment_type = 'dental check-up';

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO patients (name, appointment_type) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $appointment_type);

// Execute
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Patient Appointment</title>
    <style>
        body {
            font-family: 'Garamond', serif;
            background-color: #f5f5dc;
            color: #0f0f0f;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type=text], input[type=date], input[type=submit] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Patient to Appointment System</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Patient Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="appointment_type">Appointment Type:</label>
                <input type="text" id="appointment_type" name="appointment_type" required>
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
