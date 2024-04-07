<?php
// Simple Travel Planner App in Single File

// Database credentials
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

// Create tables if not exist
$sql = "CREATE TABLE IF NOT EXISTS trips (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    hotel VARCHAR(100),
    flight VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $destination = $_POST['destination'];
  $departure_date = $_POST['departure_date'];
  $return_date = $_POST['return_date'];
  $hotel = $_POST['hotel'];
  $flight = $_POST['flight'];
  
  $sql = "INSERT INTO trips (destination, departure_date, return_date, hotel, flight)
  VALUES ('$destination', '$departure_date', '$return_date', '$hotel', '$flight')";
  
  if ($conn->query($sql) === TRUE) {
    echo "<p>New trip successfully planned!</p>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Travel Plan App</title>
</head>
<body>

<h2>Plan Your Trip</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Destination: <input type="text" name="destination" required><br><br>
  Departure Date: <input type="date" name="departure_date" required><br><br>
  Return Date: <input type="date" name="return_date" required><br><br>
  Hotel: <input type="text" name="hotel"><br><br>
  Flight: <input type="text" name="flight"><br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>
