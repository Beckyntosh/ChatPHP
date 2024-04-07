<?php
session_start();

// Defining constants for database connection
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

// Create database connection
$mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Create table if not exists
$createPatientsTable = "
CREATE TABLE IF NOT EXISTS patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    dob DATE NOT NULL,
    medical_record TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$mysqli->query($createPatientsTable);

// Define variables and initialize with empty values
$patientFirstName = $patientLastName = "";
$records = [];

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patientFirstName = $mysqli->real_escape_string(trim($_POST['firstname']));
    $patientLastName = $mysqli->real_escape_string(trim($_POST['lastname']));

    // Prepare a select statement
    $sql = "SELECT id, firstname, lastname, dob, medical_record FROM patients WHERE firstname = ? AND lastname = ?";
    
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("ss", $param_firstname, $param_lastname);
        
        // Set parameters
        $param_firstname = $patientFirstName;
        $param_lastname = $patientLastName;

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $records = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            echo "Error executing query.";
        }
        $stmt->close();
    }
}
$mysqli->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patient Record Search</title>
    <style>
        body { font: 14px sans-serif; }
        .wrapper { width: 360px; padding: 20px; margin: auto; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Search for Patient Record</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>First Name</label>
                <input type="text" name="firstname" required>
            </div>    
            <div>
                <label>Last Name</label>
                <input type="text" name="lastname" required>
            </div>
            <div>
                <input type="submit" value="Search">
            </div>
        </form>
        
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <h2>Results</h2>
            <table>
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date of Birth</th>
                        <th>Medical Record</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($records as $row): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['firstname']); ?></td>
                            <td><?php echo htmlspecialchars($row['lastname']); ?></td>
                            <td><?php echo htmlspecialchars($row['dob']); ?></td>
                            <td><?php echo htmlspecialchars($row['medical_record']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>