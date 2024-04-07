<?php
// Connect to database
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

// Simple form processing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lastPeriod = $_POST['lastPeriod'];
    $conceptionDate = $_POST['conceptionDate'];
    $dueDate = '';

    // Calculate due date based on input
    if (!empty($lastPeriod)) {
        $dueDate = date('Y-m-d', strtotime($lastPeriod. ' + 280 days'));
    } elseif (!empty($conceptionDate)) {
        $dueDate = date('Y-m-d', strtotime($conceptionDate. ' + 266 days'));
    }

    // Store in the database
    $sql = "INSERT INTO due_dates (last_period, conception_date, due_date)
            VALUES ('$lastPeriod', '$conceptionDate', '$dueDate')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pregnancy Due Date Calculator</title>
</head>
<body>
    <h2>Pregnancy Due Date Calculator</h2>
    <form action="" method="post">
        <label for="lastPeriod">First day of last period:</label><br>
        <input type="date" id="lastPeriod" name="lastPeriod"><br>
        
        <label for="conceptionDate">Conception Date (optional if above is filled):</label><br>
        <input type="date" id="conceptionDate" name="conceptionDate"><br><br>
        
        <input type="submit" value="Calculate Due Date">
    </form>
</body>
</html>

<?php
// Setup the database and tables if not already present.
function setupDatabase() {
    global $servername, $username, $password, $dbname;
    // Create connection
    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create database if it doesn't exist
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($sql) === TRUE) {
        echo "Database created or already exists";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    // Select the database
    $conn->select_db($dbname);

    // Create table if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS due_dates (
              id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              last_period DATE,
              conception_date DATE,
              due_date DATE
            )";

    if ($conn->query($sql) === TRUE) {
        echo "Table due_dates created or already exists";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
}

setupDatabase();
?>