<?php
// Define database connection variables
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create appointments table if it does not exist
try {
    $sql = "CREATE TABLE IF NOT EXISTS appointments (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                patient_name VARCHAR(50) NOT NULL,
                appointment_type VARCHAR(50) NOT NULL,
                appointment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                UNIQUE KEY unique_appointment (patient_name, appointment_date)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    $pdo->exec($sql);
} catch (PDOException $e) {
    die("ERROR: Could not create table. " . $e->getMessage());
}

// Add patient to appointments table
try {
    // Check if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["patient_name"]) && !empty($_POST["appointment_type"])) {
        // Prepare an insert statement
        $sql = "INSERT INTO appointments (patient_name, appointment_type) VALUES (:patient_name, :appointment_type)";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":patient_name", $param_patient_name, PDO::PARAM_STR);
            $stmt->bindParam(":appointment_type", $param_appointment_type, PDO::PARAM_STR);

            // Set parameters
            $param_patient_name = trim($_POST["patient_name"]);
            $param_appointment_type = trim($_POST["appointment_type"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                echo "Appointment successfully scheduled.";
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Close connection
unset($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Patient Appointment</title>
    <style>
        body {font-family: Arial, sans-serif; background-color: #f8f9fa;}
        .wrapper {width: 350px; padding: 20px; margin: auto; background-color: white; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
        .form-group {margin-bottom: 1em;}
        .form-group label {display: block; margin-bottom: .5em;}
        .form-group input[type="text"], .form-group input[type="date"], .form-group select {width: 100%; padding: .5em; border: 1px solid #ccc; border-radius: 5px;}
        .form-group button {padding: .5em 1em; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;}
        .form-group button:hover {background-color: #0056b3;}
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Add Patient Appointment</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="patient_name">Patient Name</label>
                <input type="text" name="patient_name" id="patient_name" required>
            </div>
            <div class="form-group">
                <label for="appointment_type">Appointment Type</label>
                <select name="appointment_type" id="appointment_type" required>
                    <option value="" selected disabled>Select an appointment type</option>
                    <option value="Dental Check-up">Dental Check-up</option>
Add more appointment types as needed
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Add Appointment</button>
            </div>
        </form>
    </div>
</body>
</html>
