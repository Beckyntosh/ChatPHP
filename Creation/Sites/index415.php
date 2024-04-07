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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS travel_itinerary (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
flight VARCHAR(50),
hotel VARCHAR(50),
travel_date DATE,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table travel_itinerary created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert form data into table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST['destination'];
    $flight = $_POST['flight'];
    $hotel = $_POST['hotel'];
    $travel_date = $_POST['travel_date'];

    $sql = "INSERT INTO travel_itinerary (destination, flight, hotel, travel_date)
    VALUES ('$destination', '$flight', '$hotel', '$travel_date')";

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
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Plan Your Trip</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Destination: <input type="text" name="destination"><br><br>
  Flight: <input type="text" name="flight"><br><br>
  Hotel: <input type="text" name="hotel"><br><br>
  Travel Date: <input type="date" name="travel_date"><br><br>
  <input type="submit" value="Submit">
</form>

<h2>Your Itinerary</h2>
<?php
$sql = "SELECT id, destination, flight, hotel, travel_date FROM travel_itinerary";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>ID</th><th>Destination</th><th>Flight</th><th>Hotel</th><th>Travel Date</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["id"]."</td><td>".$row["destination"]."</td><td>".$row["flight"]."</td><td>".$row["hotel"]."</td><td>".$row["travel_date"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>
</body>
</html>
This script creates a basic travel itinerary web application including a front-end HTML form to capture user inputs (destination, flight, hotel, travel date) and PHP backend to handle the form submission and store the information into a MySQL database. It features a single-file approach without placeholders as requested, includes the database creation and operation within the same script, and echoes back a table listing all the planned trips. Keep in mind, for a real-world application, security measures like prepared statements for database operations and user input validations should be implemented to safeguard against SQL injection and other vulnerabilities.