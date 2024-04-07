<?php

* Connect to MySQL database */
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

// SQL to create table if it doesn't exist
$createPatientsTable = "CREATE TABLE IF NOT EXISTS Patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    appointment_date DATETIME NOT NULL,
    reason VARCHAR(100),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($createPatientsTable) === TRUE) {
    echo "Table Patients created successfully or already exists.";
} else {
    echo "Error creating table: " . $conn->error;
}

* If form is submitted, add patient */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $appointment_date = $_POST['appointment_date'];
    $reason = $_POST['reason'];

    $sql = "INSERT INTO Patients (firstname, lastname, appointment_date, reason)
    VALUES ('$firstname', '$lastname', '$appointment_date', '$reason')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>New record created successfully</p>";
    } else {
        echo "<p>Error: " . $sql . "</p><p>" . $conn->error . "</p>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Patient to Appointment System</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #f0db4f;
            color: #323330;
        }
        .container {
            width: 80%;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
        }
        input, textarea, button {
            margin-top: 5px;
        }
        button {
            background-color: #323330;
            color: #f0db4f;
            padding: 10px;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #44403c;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Add a New Patient</h2>
    <form method="POST" action="">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required>

        <label for="appointment_date">Appointment Date (YYYY-MM-DD HH:MM:SS):</label>
        <input type="text" id="appointment_date" name="appointment_date" required>

        <label for="reason">Reason for Visit:</label>
        <textarea id="reason" name="reason" required></textarea>

        <button type="submit">Add Patient</button>
    </form>
</div>
</body>
</html>
