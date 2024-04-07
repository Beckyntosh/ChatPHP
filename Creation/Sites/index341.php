<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
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

    // Create table if it does not exist
    $sql = "CREATE TABLE IF NOT EXISTS travel_itinerary (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            destination VARCHAR(30) NOT NULL,
            departure_date DATE NOT NULL,
            return_date DATE NOT NULL,
            flight_details TEXT,
            hotel_details TEXT,
            reg_date TIMESTAMP
            )";

    if ($conn->query($sql) === TRUE) {
        // Table created successfully or already exists
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // Sanitize and prepare the POST data
    $destination = $conn->real_escape_string($_POST['destination']);
    $departureDate = $conn->real_escape_string($_POST['departure_date']);
    $returnDate = $conn->real_escape_string($_POST['return_date']);
    $flightDetails = $conn->real_escape_string($_POST['flight_details']);
    $hotelDetails = $conn->real_escape_string($_POST['hotel_details']);

    // Insert travel details into the database
    $sql = "INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details)
            VALUES ('$destination', '$departureDate', '$returnDate', '$flightDetails', '$hotelDetails')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Itinerary Planner</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h2>Plan Your Trip</h2>
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
</body>
</html>
