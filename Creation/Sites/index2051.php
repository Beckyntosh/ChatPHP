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

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $petName = $_POST['petName'];
    $petType = $_POST['petType'];
    $healthInfo = $_POST['healthInfo'];

    $sql = "INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('$petName', '$petType', '$healthInfo')";

    if ($conn->query($sql) === TRUE) {
        echo "New pet profile created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS PetProfiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
petName VARCHAR(50) NOT NULL,
petType VARCHAR(50),
healthInfo TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table PetProfiles created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Pet Profile</title>
</head>
<body>
    <h2>Create Pet Profile</h2>
    <form method="POST">
        <label for="petName">Pet Name:</label><br>
        <input type="text" id="petName" name="petName" required><br>
        <label for="petType">Pet Type:</label><br>
        <input type="text" id="petType" name="petType" required><br>
        <label for="healthInfo">Health Info:</label><br>
        <textarea id="healthInfo" name="healthInfo" required></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
