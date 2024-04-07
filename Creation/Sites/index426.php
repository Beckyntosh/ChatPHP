<?php
// Simple travel itinerary system in PHP and MySQL for educational purpose

// Database connection
$servername = 'db';
$username = 'root';
$password = 'root';
$dbname = 'my_database';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$createTable = "CREATE TABLE IF NOT EXISTS travel_itinerary (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(30) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_details VARCHAR(255),
    hotel_details VARCHAR(255),
    reg_date TIMESTAMP
)";

if ($conn->query($createTable) === FALSE) {
  echo "Error creating table: " . $conn->error;
}

// Handling form data
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
<html>
<head>
    <title>Travel Itinerary</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 50%; margin: auto; }
        input, textarea { width: 100%; margin-bottom: 10px; padding: 10px; }
        label { margin-bottom: 10px; display: block; }
        button { padding: 10px 20px; cursor: pointer; }
    </style>
</head>
<body>

<div class="container">
    <h2>Add Your Travel Plan</h2>
    <form method="post">
        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination" required>

        <label for="departure_date">Departure Date:</label>
        <input type="date" id="departure_date" name="departure_date" required>

        <label for="return_date">Return Date:</label>
        <input type="date" id="return_date" name="return_date" required>

        <label for="flight_details">Flight Details:</label>
        <textarea id="flight_details" name="flight_details"></textarea>

        <label for="hotel_details">Hotel Details:</label>
        <textarea id="hotel_details" name="hotel_details"></textarea>

        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>

<?php
$conn->close();
?>
