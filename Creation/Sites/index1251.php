<?php
// Establish database connection
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS travel_plan (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    departure_date DATE,
    return_date DATE,
    flight_details TEXT,
    hotel_details TEXT,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Planner</title>
</head>
<body>
<h1>Travel Plan for Craft Beers Website</h1>
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
    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $destination = $_POST['destination'];
    $departure_date = $_POST['departure_date'];
    $return_date = $_POST['return_date'];
    $flight_details = $_POST['flight_details'];
    $hotel_details = $_POST['hotel_details'];

    $sql = "INSERT INTO travel_plan (destination, departure_date, return_date, flight_details, hotel_details)
    VALUES ('$destination', '$departure_date', '$return_date', '$flight_details', '$hotel_details')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
</body>
</html>
