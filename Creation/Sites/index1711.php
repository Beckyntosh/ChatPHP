<?php
// Connecting to database
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
$createTable = "CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pet_name VARCHAR(30) NOT NULL,
pet_type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($createTable) === TRUE) {
    echo "<p>Table pet_profiles created successfully or already exists.</p>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_name = $_POST["pet_name"];
    $pet_type = $_POST["pet_type"];
    $health_info = $_POST["health_info"];

    $sql = "INSERT INTO pet_profiles (pet_name, pet_type, health_info)
    VALUES ('$pet_name', '$pet_type', '$health_info')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>New record created successfully.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Pet Profile</title>
    <style>
        label, input {
            display: block;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h2>Create a Pet Profile</h2>
    <form action="" method="post">
        <label for="pet_name">Pet Name:</label>
        <input type="text" id="pet_name" name="pet_name" required>
        
        <label for="pet_type">Pet Type:</label>
        <input type="text" id="pet_type" name="pet_type" required>
        
        <label for="health_info">Health Information:</label>
        <textarea id="health_info" name="health_info"></textarea>
        
        <input type="submit" value="Create Profile">
    </form>
</body>
</html>
