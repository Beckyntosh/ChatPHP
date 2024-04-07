<?php
// Basic Travel Plan App in a single PHP file with a MySQL database backend

$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create travel_plans table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS travel_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_details TEXT NOT NULL,
    hotel_details TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTable)) {
    echo "Error creating table: " . $conn->error;
}

// Insert data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST['destination'];
    $departure_date = $_POST['departure_date'];
    $return_date = $_POST['return_date'];
    $flight_details = $_POST['flight_details'];
    $hotel_details = $_POST['hotel_details'];

    $insertSQL = "INSERT INTO travel_plans (destination, departure_date, return_date, flight_details, hotel_details) 
                VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($insertSQL);
    $stmt->bind_param("sssss", $destination, $departure_date, $return_date, $flight_details, $hotel_details);

    if (!$stmt->execute()) {
        echo "Error inserting data: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Travel Plan App</title>
<style>
    body { font-family: Arial, sans-serif; }
    form { margin-top: 20px; }
</style>
</head>
<body>
<h2>Travel Plan</h2>
<form action="" method="post">
    <label for="destination">Destination:</label><br>
    <input type="text" id="destination" name="destination" required><br>
    <label for="departure_date">Departure Date:</label><br>
    <input type="date" id="departure_date" name="departure_date" required><br>
    <label for="return_date">Return Date:</label><br>
    <input type="date" id="return_date" name="return_date" required><br>
    <label for="flight_details">Flight Details:</label><br>
    <textarea id="flight_details" name="flight_details" required></textarea><br>
    <label for="hotel_details">Hotel Details:</label><br>
    <textarea id="hotel_details" name="hotel_details" required></textarea><br>
    <input type="submit" value="Save Travel Plan">
</form>
</body>
</html>
