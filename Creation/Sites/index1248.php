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
$sql = "CREATE TABLE IF NOT EXISTS travel_plan (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
departure_date DATE NOT NULL,
return_date DATE NOT NULL,
flight_details TEXT,
hotel_details TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo ""; // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $destination = $_POST['destination'];
  $departure_date = $_POST['departure_date'];
  $return_date = $_POST['return_date'];
  $flight_details = $_POST['flight_details'];
  $hotel_details = $_POST['hotel_details'];

  $stmt = $conn->prepare("INSERT INTO travel_plan (destination, departure_date, return_date, flight_details, hotel_details) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $destination, $departure_date, $return_date, $flight_details, $hotel_details);

  if($stmt->execute()) {
    echo "<p>Travel plan added successfully!</p>";
  } else {
    echo "<p>Error adding travel plan: " . $conn->error . "</p>";
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Beauty Products: Travel Planner</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 50%; margin: auto; background-color: #f2f2f2; padding: 20px; }
        input[type=text], input[type=date] { width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; }
        button { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%; }
    </style>
</head>
<body>

<div class="container">
  <h2>Create Your Travel Plan</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="destination">Destination:</label>
    <input type="text" id="destination" name="destination" required>
    
    <label for="departure_date">Departure Date:</label>
    <input type="date" id="departure_date" name="departure_date" required>
    
    <label for="return_date">Return Date:</label>
    <input type="date" id="return_date" name="return_date" required>
    
    <label for="flight_details">Flight Details:</label>
    <textarea id="flight_details" name="flight_details" style="width:100%;height:100px;"></textarea>
    
    <label for="hotel_details">Hotel Details:</label>
    <textarea id="hotel_details" name="hotel_details" style="width:100%;height:100px;"></textarea>
    
    <button type="submit">Submit</button>
  </form>
</div>

</body>
</html>
