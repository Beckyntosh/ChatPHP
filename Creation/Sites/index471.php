<?php
// Database configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS travel_itinerary (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_details VARCHAR(255),
    hotel_details VARCHAR(255),
    reg_date TIMESTAMP
)";

if (!$conn->query($tableCreationQuery)) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST['destination'];
    $departure_date = $_POST['departureDate'];
    $return_date = $_POST['returnDate'];
    $flight_details = $_POST['flightDetails'];
    $hotel_details = $_POST['hotelDetails'];

    $stmt = $conn->prepare("INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $destination, $departure_date, $return_date, $flight_details, $hotel_details);
    $stmt->execute();
    $stmt->close();
    echo "<p>Travel itinerary added successfully!</p>";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Travel Itinerary Planner</title>
</head>
<body>
    <h2>Plan Your Travel</h2>
    <form method="post" action="">
        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination" required><br><br>

        <label for="departureDate">Departure Date:</label>
        <input type="date" id="departureDate" name="departureDate" required><br><br>

        <label for="returnDate">Return Date:</label>
        <input type="date" id="returnDate" name="returnDate" required><br><br>

        <label for="flightDetails">Flight Details:</label>
        <textarea id="flightDetails" name="flightDetails"></textarea><br><br>

        <label for="hotelDetails">Hotel Details:</label>
        <textarea id="hotelDetails" name="hotelDetails"></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
