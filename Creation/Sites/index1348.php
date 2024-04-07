<?php
// Connection.php
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

// Create Patient table
$createTableSql = "CREATE TABLE IF NOT EXISTS patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_time TIME NOT NULL,
    reason VARCHAR(255),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($createTableSql) === TRUE) {
    // Table created successfully
} else {
    echo "Error creating table: " . $conn->error;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Patient to Appointment System</title>
    <style>
        body{ font-family: Arial; background-color: #f2f2f2; margin: 0; padding: 20px; }
        .container { background-color: white; padding: 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        form { margin: 0; }
        input[type=text], input[type=date], input[type=time] { width: calc(100% - 22px); padding: 10px; margin-top: 8px; margin-bottom: 16px; border: 1px solid #ccc; border-radius: 4px; }
        input[type=submit] { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="container">
    <h2>Add New Patient Appointment</h2>
    <form action="" method="post">
        <label for="fname">Full Name</label>
        <input type="text" id="fname" name="fullname" placeholder="Jane Doe">
        
        <label for="date">Appointment Date</label>
        <input type="date" id="date" name="appointment_date">
        
        <label for="time">Appointment Time</label>
        <input type="time" id="time" name="appointment_time">
        
        <label for="reason">Appointment Reason</label>
        <input type="text" id="reason" name="reason" placeholder="Dental Check-up">

        <input type="submit" value="Add Patient">
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect value of input field
    $fullname = $_POST['fullname'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $reason = $_POST['reason'];

    if (!empty($fullname) && !empty($appointment_date) && !empty($appointment_time)) {
        $addPatientSql = "INSERT INTO patients (fullname, appointment_date, appointment_time, reason)
        VALUES ('$fullname', '$appointment_date', '$appointment_time', '$reason')";
        
        if ($conn->query($addPatientSql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $addPatientSql . "<br>" . $conn->error;
        }
    } else {
        echo "Full Name, Appointment Date, and Appointment Time are required fields.";
    }
}
$conn->close();
?>

</body>
</html>
