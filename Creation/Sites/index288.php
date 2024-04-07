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

// Create travel itinerary table if not exists
$sql = "CREATE TABLE IF NOT EXISTS travel_itinerary (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
departure_date DATE NOT NULL,
return_date DATE NOT NULL,
flight_details TEXT,
hotel_details TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Insert new itinerary
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST['destination'];
    $departure_date = $_POST['departure_date'];
    $return_date = $_POST['return_date'];
    $flight_details = $_POST['flight_details'];
    $hotel_details = $_POST['hotel_details'];

    $sql = "INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details)
    VALUES ('$destination', '$departure_date', '$return_date', '$flight_details', '$hotel_details')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Itinerary</title>
</head>
<body>
    <h2>Plan Your Trip</h2>
    <form method="post" action="">
        Destination: <input type="text" name="destination" required><br><br>
        Departure Date: <input type="date" name="departure_date" required><br><br>
        Return Date: <input type="date" name="return_date" required><br><br>
        Flight Details:<br><textarea name="flight_details" rows="5" required></textarea><br><br>
        Hotel Details:<br><textarea name="hotel_details" rows="5" required></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php $conn->close(); ?>
