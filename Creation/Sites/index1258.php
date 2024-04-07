<?php
// Simple Travel Planner for a Makeup Website in PHP with MySQL Database
// NOTE: This is a basic example. Make sure to secure your application properly (use prepared statements to avoid SQL injection, etc.)

// Database configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create tables if they do not exist
$sqlTableTravelPlans = "CREATE TABLE IF NOT EXISTS TravelPlans (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
startDate DATE NOT NULL,
endDate DATE NOT NULL,
hotel VARCHAR(50),
flightDetails VARCHAR(100),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$sqlTableUsers = "CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL UNIQUE,
password VARCHAR(50) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// Execute table creation
$conn->query($sqlTableTravelPlans);
$conn->query($sqlTableUsers);

// Handle user submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Prepare statement to insert user's travel plan
  $stmt = $conn->prepare("INSERT INTO TravelPlans (destination, startDate, endDate, hotel, flightDetails) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $destination, $startDate, $endDate, $hotel, $flightDetails);

  // Parameters from POST request
  $destination = $_POST['destination'];
  $startDate = $_POST['startDate'];
  $endDate = $_POST['endDate'];
  $hotel = $_POST['hotel'];
  $flightDetails = $_POST['flightDetails'];

  // Execute
  $stmt->execute();
  echo "<p>Travel Plan Saved Successfully!</p>";

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Basic Travel Plan</title>
</head>
<body>
<h2>Enter Your Travel Plan</h2>
<form method="post">
  <label for="destination">Destination:</label><br>
  <input type="text" id="destination" name="destination" required><br>
  <label for="startDate">Start Date:</label><br>
  <input type="date" id="startDate" name="startDate" required><br>
  <label for="endDate">End Date:</label><br>
  <input type="date" id="endDate" name="endDate" required><br>
  <label for="hotel">Hotel:</label><br>
  <input type="text" id="hotel" name="hotel"><br>
  <label for="flightDetails">Flight Details:</label><br>
  <input type="text" id="flightDetails" name="flightDetails"><br><br>
  <input type="submit" value="Submit">
</form>
</body>
</html>
