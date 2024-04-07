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

// Create travel plan table if not exists
$sql = "CREATE TABLE IF NOT EXISTS travel_plans (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
departure_date DATE NOT NULL,
return_date DATE NOT NULL,
flights_details TEXT,
hotel_details TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table travel_plans created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handling form submission
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['destination'])){
    $destination = $_POST['destination'];
    $departure_date = $_POST['departure_date'];
    $return_date = $_POST['return_date'];
    $flights_details = $_POST['flights_details'];
    $hotel_details = $_POST['hotel_details'];

    $stmt = $conn->prepare("INSERT INTO travel_plans (destination, departure_date, return_date, flights_details, hotel_details) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $destination, $departure_date, $return_date, $flights_details, $hotel_details);

    if ($stmt->execute()) {
      //echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Plan App</title>
</head>
<body>
    <h1>Create Your Travel Plan</h1>
    <form method="post">
        <label for="destination">Destination:</label><br>
        <input type="text" id="destination" name="destination" required><br>
        <label for="departure_date">Departure Date:</label><br>
        <input type="date" id="departure_date" name="departure_date" required><br>
        <label for="return_date">Return Date:</label><br>
        <input type="date" id="return_date" name="return_date" required><br>
        <label for="flights_details">Flights Details:</label><br>
        <textarea id="flights_details" name="flights_details" rows="4" cols="50" required></textarea><br>
        <label for="hotel_details">Hotel Details:</label><br>
        <textarea id="hotel_details" name="hotel_details" rows="4" cols="50" required></textarea><br>
        <input type="submit" value="Submit">
    </form>

    <h2>Travel Plans</h2>
    <?php
    $sql = "SELECT destination, departure_date, return_date, flights_details, hotel_details FROM travel_plans";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<p>Destination: " . $row["destination"]. " - Departure: " . $row["departure_date"]. " - Return: " . $row["return_date"]. "<br>Flights: " . $row["flights_details"]. "<br>Hotel: " . $row["hotel_details"]. "</p>";
      }
    } else {
      echo "0 results";
    }
    $conn->close();
    ?>
</body>
</html>
