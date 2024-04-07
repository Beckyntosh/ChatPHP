<?php
// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO vehicles (make, model, year, maintenance_schedule, usage) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiis", $make, $model, $year, $maintenance_schedule, $usage);

    // Set parameters and execute
    $make = $_POST['make'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $maintenance_schedule = $_POST['maintenance_schedule'];
    $usage = $_POST['usage'];
    $stmt->execute();

    echo "New vehicle added successfully";

    $stmt->close();
    $conn->close();
}

// HTML Content below
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Vehicle to Fleet Management</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 50%;
            margin: auto;
            background: #fff;
            padding: 15px;
            box-shadow: 0px 0px 10px 0px #000;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type=text], input[type=number], input[type=date] {
            width: 100%;
            padding: 8px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Vehicle to Fleet</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="make">Make:</label>
                <input type="text" id="make" name="make" required>
            </div>
            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" id="model" name="model" required>
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="number" id="year" name="year" required>
            </div>
            <div class="form-group">
                <label for="maintenance_schedule">Maintenance Schedule (YYYY-MM-DD):</label>
                <input type="date" id="maintenance_schedule" name="maintenance_schedule" required>
            </div>
            <div class="form-group">
                <label for="usage">Usage:</label>
                <input type="text" id="usage" name="usage" required>
            </div>
            <button type="submit">Add Vehicle</button>
        </form>
    </div>
</body>
</html>

<?php
// PHP code for creating the table if it doesn't exist

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

// SQL to create table
$sql = "CREATE TABLE IF NOT EXISTS vehicles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
make VARCHAR(30) NOT NULL,
model VARCHAR(30) NOT NULL,
year INT(4) NOT NULL,
maintenance_schedule DATE NOT NULL,
usage VARCHAR(255) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>