<?php
// Set the content type to be HTML
header('Content-Type: text/html; charset=utf-8');

// VARIABLES for connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS plants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
plant_name VARCHAR(50) NOT NULL,
care_schedule TEXT NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plant_name = $_POST['plant_name'];
    $care_schedule = $_POST['care_schedule'];

    $stmt = $conn->prepare("INSERT INTO plants (plant_name, care_schedule) VALUES (?, ?)");
    $stmt->bind_param("ss", $plant_name, $care_schedule);
    
    // Execute and check
    if ($stmt->execute() === TRUE) {
        echo "New plant added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gardening Tracker - Add Plant</title>
</head>
<body>
    <h2>Add a Plant to Your Garden</h2>
    <form action="" method="post">
        <label for="plant_name">Plant Name:</label><br>
        <input type="text" id="plant_name" name="plant_name" required><br>
        <label for="care_schedule">Care Schedule:</label><br>
        <textarea id="care_schedule" name="care_schedule" rows="4" cols="50" required></textarea><br>
        <input type="submit" value="Add Plant">
    </form>
</body>
</html>
