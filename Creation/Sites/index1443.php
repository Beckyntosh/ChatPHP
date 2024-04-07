<?php

$server = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS plants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
plant_name VARCHAR(30) NOT NULL,
care_schedule VARCHAR(50)
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plant_name = $_POST['plant_name'];
    $care_schedule = $_POST['care_schedule'];

    $stmt = $conn->prepare("INSERT INTO plants (plant_name, care_schedule) VALUES (?, ?)");
    $stmt->bind_param("ss", $plant_name, $care_schedule);
    
    if($stmt->execute()){
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a Plant to Gardening Tracker</title>
</head>
<body>
    <h2>Add a Plant to Your Garden</h2>
    <form method="POST" action="">
        <label for="plant_name">Plant Name:</label>
        <input type="text" id="plant_name" name="plant_name" required><br><br>
        
        <label for="care_schedule">Care Schedule:</label>
        <input type="text" id="care_schedule" name="care_schedule" required><br><br>
        
        <input type="submit" value="Add Plant">
    </form>
</body>
</html>
