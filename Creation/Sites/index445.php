<?php
// Simple Travel Itinerary Web Application in PHP and MySQL

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

// Create tables if they don't exist
$tables_sql = array(
  "CREATE TABLE IF NOT EXISTS trips (
    trip_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    reg_date TIMESTAMP
  )",
  "CREATE TABLE IF NOT EXISTS flights (
    flight_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    trip_id INT(6) UNSIGNED,
    flight_number VARCHAR(10) NOT NULL,
    departure_time DATETIME NOT NULL,
    arrival_time DATETIME NOT NULL,
    FOREIGN KEY (trip_id) REFERENCES trips(trip_id)
  )",
  "CREATE TABLE IF NOT EXISTS hotels (
    hotel_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    trip_id INT(6) UNSIGNED,
    hotel_name VARCHAR(50) NOT NULL,
    check_in DATE NOT NULL,
    check_out DATE NOT NULL,
    FOREIGN KEY (trip_id) REFERENCES trips(trip_id)
  )"
);

foreach ($tables_sql as $sql) {
  if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
  }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['destination'])) {
  $destination = $_POST['destination'];
  $departure_date = $_POST['departure_date'];
  $return_date = $_POST['return_date'];
  
  $sql = "INSERT INTO trips (destination, departure_date, return_date)
  VALUES ('$destination', '$departure_date', '$return_date')";
  
  if ($conn->query($sql) === TRUE) {
    echo "New trip successfully created";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Itinerary</title>
</head>
<body>

<h2>Create Trip</h2>

<form method="post" action="">
    <label for="destination">Destination:</label><br>
    <input type="text" id="destination" name="destination"><br>
    <label for="departure_date">Departure Date:</label><br>
    <input type="date" id="departure_date" name="departure_date"><br>
    <label for="return_date">Return Date:</label><br>
    <input type="date" id="return_date" name="return_date"><br>
    <input type="submit" value="Submit">
</form> 

</body>
</html>

<?php
$conn->close();
?>
Please note: Deploying this code into a production environment without proper security mechanisms (like input validation and output encoding) exposes your application to SQL injection and other security vulnerabilities. This code is simplified for educational purposes and should be expanded with security best practices in mind.