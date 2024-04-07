<?php

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connection parameters
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

    // Escape user inputs for security
    $petName = mysqli_real_escape_string($conn, $_POST['petName']);
    $petType = mysqli_real_escape_string($conn, $_POST['petType']);
    $healthInfo = mysqli_real_escape_string($conn, $_POST['healthInfo']);

    // Attempt insert query execution
    $sql = "INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES ('$petName', '$petType', '$healthInfo')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Pet Profile</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { margin: auto; width: 50%; padding: 20px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Create a Profile for Your Pet</h2>
    <form action="" method="post">
        <div>
            <label for="petName">Pet's Name:</label>
            <input type="text" id="petName" name="petName" required>
        </div>
        <div>
            <label for="petType">Pet Type:</label>
            <input type="text" id="petType" name="petType" required>
        </div>
        <div>
            <label for="healthInfo">Health Information:</label>
            <textarea id="healthInfo" name="healthInfo" required></textarea>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</div>

</body>
</html>
<?php
// Create table and database if not exists
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    // Select the database
    $conn->select_db($dbname);

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS PetProfiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    petName VARCHAR(30) NOT NULL,
    petType VARCHAR(30) NOT NULL,
    healthInfo TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) !== TRUE) {
        echo "Error creating table: " . $conn->error;
    }
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>
