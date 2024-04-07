<?php
// Simple Single File PHP/HTML for a Basic Travel Itinerary Management System - Sherlock Holmes Style

// Database connection parameters
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
    flight_info TEXT,
    hotel_info TEXT,
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = mysqli_real_escape_string($conn, $_POST['destination']);
    $departure_date = mysqli_real_escape_string($conn, $_POST['departure_date']);
    $return_date = mysqli_real_escape_string($conn, $_POST['return_date']);
    $flight_info = mysqli_real_escape_string($conn, $_POST['flight_info']);
    $hotel_info = mysqli_real_escape_string($conn, $_POST['hotel_info']);

    $sql = "INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_info, hotel_info)
    VALUES ('$destination', '$departure_date', '$return_date', '$flight_info', '$hotel_info')";
    
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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Travel Itinerary</title>
<style>
* Sherlock Holmes Style */
body {
    background: #fdf5e6;
    font-family: 'Times New Roman', Times, serif;
    color: #3e2210;
}
form, table {
    margin: 20px auto;
    padding: 20px;
    border: 2px solid #3e2210;
}
td, th {
    padding: 10px;
    text-align: left;
}
</style>
</head>
<body>
<h2>Travel Itinerary Planner</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="destination">Destination:</label><br>
    <input type="text" id="destination" name="destination" required><br><br>
    <label for="departure_date">Departure Date:</label><br>
    <input type="date" id="departure_date" name="departure_date" required><br><br>
    <label for="return_date">Return Date:</label><br>
    <input type="date" id="return_date" name="return_date" required><br><br>
    <label for="flight_info">Flight Information:</label><br>
    <textarea id="flight_info" name="flight_info" required></textarea><br><br>
    <label for="hotel_info">Hotel Information:</label><br>
    <textarea id="hotel_info" name="hotel_info" required></textarea><br><br>
    <input type="submit" value="Submit">
</form>
<h2>Existing Itineraries</h2>
<table>
<tr>
    <th>Destination</th>
    <th>Departure Date</th>
    <th>Return Date</th>
    <th>Flight Information</th>
    <th>Hotel Information</th>
</tr>

<?php
$sql = "SELECT destination, departure_date, return_date, flight_info, hotel_info FROM travel_itinerary";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>".$row["destination"]."</td>
    <td>".$row["departure_date"]."</td>
    <td>".$row["return_date"]."</td>
    <td>".$row["flight_info"]."</td>
    <td>".$row["hotel_info"]."</td>
    </tr>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
</table>
</body>
</html>
