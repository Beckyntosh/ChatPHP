<?php
// Database Connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS travelPlans (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  destination VARCHAR(30) NOT NULL,
  departure_date DATE NOT NULL,
  return_date DATE NOT NULL,
  flight_details TEXT NOT NULL,
  hotel_details TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($table_sql)) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $destination = $_POST['destination'];
  $departure_date = $_POST['departure_date'];
  $return_date = $_POST['return_date'];
  $flight_details = $_POST['flight_details'];
  $hotel_details = $_POST['hotel_details'];

  $insert_sql = "INSERT INTO travelPlans (destination, departure_date, return_date, flight_details, hotel_details)
  VALUES ('$destination', '$departure_date', '$return_date', '$flight_details', '$hotel_details')";

  if ($conn->query($insert_sql) !== TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
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
  <h2>Plan your Travel</h2>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Destination: <input type="text" name="destination" required><br><br>
    Departure Date: <input type="date" name="departure_date" required><br><br>
    Return Date: <input type="date" name="return_date" required><br><br>
    Flight Details: <textarea name="flight_details" required></textarea><br><br>
    Hotel Details: <textarea name="hotel_details" required></textarea><br><br>
    <input type="submit" value="Submit">
  </form>

  <?php
  // Displaying plans
  $select_sql = "SELECT * FROM travelPlans ORDER BY created_at DESC";
  $result = $conn->query($select_sql);
  
  if ($result->num_rows > 0) {
    echo "<h2>Your Travel Plans</h2>";
    while($row = $result->fetch_assoc()) {
      echo "<p><strong>Destination:</strong> ".$row["destination"].". <strong>Departure Date:</strong> ".$row["departure_date"].". <strong>Return Date:</strong> ".$row["return_date"].". <strong>Flight Details:</strong> ".$row["flight_details"].". <strong>Hotel Details:</strong> ".$row["hotel_details"].".</p>";
    }
  } else {
    echo "No plans found";
  }
  $conn->close();
  ?>

</body>
</html>
