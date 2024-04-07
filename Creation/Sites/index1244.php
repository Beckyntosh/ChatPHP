<?php
// Set up the connection to the database
$dbServername = "db";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "my_database";

// Create connection
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they do not exist
$sql = "CREATE TABLE IF NOT EXISTS trips (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    start_date DATE,
    end_date DATE,
    flight_details TEXT,
    hotel_details TEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table creation success
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert a new trip if a POST request is detected
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST['destination'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $flight_details = $_POST['flight_details'];
    $hotel_details = $_POST['hotel_details'];

    $sql = "INSERT INTO trips (destination, start_date, end_date, flight_details, hotel_details) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $destination, $start_date, $end_date, $flight_details, $hotel_details);
    
    if ($stmt->execute()) {
        echo "New trip added successfully";
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
    <title>Travel Plan App</title>
</head>
<body>
    <h2>Plan Your Trip</h2>
    <form method="POST">
        <label for="destination">Destination:</label><br>
        <input type="text" id="destination" name="destination" required><br>
        
        <label for="start_date">Start Date:</label><br>
        <input type="date" id="start_date" name="start_date" required><br>
        
        <label for="end_date">End Date:</label><br>
        <input type="date" id="end_date" name="end_date" required><br>
        
        <label for="flight_details">Flight Details:</label><br>
        <textarea id="flight_details" name="flight_details" rows="4" cols="50" required></textarea><br>
        
        <label for="hotel_details">Hotel Details:</label><br>
        <textarea id="hotel_details" name="hotel_details" rows="4" cols="50" required></textarea><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
