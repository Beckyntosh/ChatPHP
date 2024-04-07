<?php
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

// Create table if not exists
$tableQuery = "CREATE TABLE IF NOT EXISTS plants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plant_name VARCHAR(30) NOT NULL,
    care_schedule VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
)";

if (!$conn->query($tableQuery) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plantName = $_POST['plantName'];
    $careSchedule = $_POST['careSchedule'];

    $stmt = $conn->prepare("INSERT INTO plants (plant_name, care_schedule) VALUES (?, ?)");
    $stmt->bind_param("ss", $plantName, $careSchedule);
    
    if ($stmt->execute()) {
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gardening Tracker</title>
</head>
<body>
    <h2>Add a Plant to Gardening Tracker</h2>
    <form action="" method="post">
        <label for="plantName">Plant Name:</label><br>
        <input type="text" id="plantName" name="plantName" value=""><br>
        <label for="careSchedule">Care Schedule:</label><br>
        <input type="text" id="careSchedule" name="careSchedule" value=""><br><br>
        <input type="submit" value="Submit">
    </form> 
</body>
</html>
