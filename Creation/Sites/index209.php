<?php
// Define MySQL connection parameters
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

// Create table for patients if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_type VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_type = $_POST['appointment_type'];
    
    // Insert new patient
    $sql = "INSERT INTO patients (name, appointment_date, appointment_type) VALUES ('$name', '$appointment_date', '$appointment_type')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Patient to Appointment System</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        input[type=text], input[type=date] { width: 100%; padding: 12px; margin-top: 6px; margin-bottom: 16px; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; }
        button { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%; }
        button:hover { opacity: 0.8; }
    </style>
</head>
<body>

<div class="container">
    <h2>Add Patient to Appointment System</h2>
    <form action="" method="post">
        <label for="name">Patient Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="appointment_date">Appointment Date:</label>
        <input type="date" id="appointment_date" name="appointment_date" required>
        
        <label for="appointment_type">Appointment Type:</label>
        <input type="text" id="appointment_type" name="appointment_type" required>
        
        <button type="submit">Add Patient</button>
    </form>
</div>

</body>
</html>
