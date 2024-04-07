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

// Create travel itinerary table
$createTable = "CREATE TABLE IF NOT EXISTS travel_itinerary (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
flight_number VARCHAR(30),
hotel_name VARCHAR(50),
travel_date DATE,
reg_date TIMESTAMP
)";

if ($conn->query($createTable) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $destination = $_POST["destination"];
  $flight_number = $_POST["flight_number"];
  $hotel_name = $_POST["hotel_name"];
  $travel_date = $_POST["travel_date"];
  
  $insertSQL = "INSERT INTO travel_itinerary (destination, flight_number, hotel_name, travel_date) 
  VALUES ('$destination', '$flight_number', '$hotel_name', '$travel_date')";

  if ($conn->query($insertSQL) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $insertSQL . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Travel Itinerary</title>
</head>
<body>
<h2>Plan Your Travel</h2>

<form action="" method="post">
  Destination:<br>
  <input type="text" name="destination" required>
  <br>
  Flight Number:<br>
  <input type="text" name="flight_number">
  <br>
  Hotel Name:<br>
  <input type="text" name="hotel_name">
  <br>
  Travel Date:<br>
  <input type="date" name="travel_date" required>
  <br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>
