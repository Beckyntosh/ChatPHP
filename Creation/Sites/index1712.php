<?php
// Connecting to the database
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

// Create table for Pet Profiles if not exists
$sql = "CREATE TABLE IF NOT EXISTS pet_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pet_name VARCHAR(50) NOT NULL,
    pet_type VARCHAR(50),
    health_info TEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle Post Request for Profile Creation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pet_name = $_POST['pet_name'];
    $pet_type = $_POST['pet_type'];
    $health_info = $_POST['health_info'];

    $stmt = $conn->prepare("INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $pet_name, $pet_type, $health_info);
    
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt . "<br>" . $conn->error;
    }

    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Pet Profile</title>
</head>
<body>
    <h2>Pet Profile Creation</h2>
    <form method="POST">
        <label for="pet_name">Pet's Name:</label><br>
        <input type="text" id="pet_name" name="pet_name" required><br>
        <label for="pet_type">Pet's Type:</label><br>
        <input type="text" id="pet_type" name="pet_type" required><br>
        <label for="health_info">Health Information:</label><br>
        <textarea id="health_info" name="health_info" required></textarea><br><br>
        <input type="submit" value="Create Profile">
    </form>
</body>
</html>
