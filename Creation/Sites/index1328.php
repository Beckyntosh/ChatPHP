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

// Check if the table exists, if not create it
$tableCheckQuery = "SHOW TABLES LIKE 'Patients'";
$result = $conn->query($tableCheckQuery);

if ($result->num_rows == 0) {
    $createTableSQL = "CREATE TABLE Patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    appointment_reason VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
    )";

    if ($conn->query($createTableSQL) === TRUE) {
        echo "<script>console.log('Table Patients created successfully');</script>";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Function to sanitize data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Add patient to the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = test_input($_POST["fullname"]);
    $appointment_reason = test_input($_POST["appointment_reason"]);

    $sql = "INSERT INTO Patients (fullname, appointment_reason) VALUES ('$fullname', '$appointment_reason')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New record created successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
            background-color: #f0f0f5;
            font-family: Arial, sans-serif;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Add Patient</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required>

            <label for="appointment_reason">Reason for Appointment:</label>
            <input type="text" id="appointment_reason" name="appointment_reason" required>

            <input type="submit" value="Add Patient">
        </form>
    </div>
</body>

</html>
