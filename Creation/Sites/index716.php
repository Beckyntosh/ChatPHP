<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Users table
$sql = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Products table
$sql = "CREATE TABLE products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productname VARCHAR(30) NOT NULL,
price INT(6) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table products created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
<title>Fitness Equipment Online Appointment</title>
<style>
    body {
        background-color: #333;
        font-family: Arial, sans-serif;
        color: white;
    }
    /* Mountain Majesty theme colors */
    h2 {
        color: #794043;
    }
    p {
        color: #4D5C5C;
    }
</style>
</head>
<body>
    <h2>Welcome to Fitness Equipment Online Appointment</h2>
    <p>Book your appointment for trying out our fitness equipment.</p>
</body>
</html>