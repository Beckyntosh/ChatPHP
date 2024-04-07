<?php
// Database configuration
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'my_database');

// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$createTable = "CREATE TABLE IF NOT EXISTS travel_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_details TEXT NOT NULL,
    hotel_details TEXT NOT NULL,
    reg_date TIMESTAMP
    )";

if ($conn->query($createTable) === FALSE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $stmt = $conn->prepare("INSERT INTO travel_plans (destination, departure_date, return_date, flight_details, hotel_details) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $destination, $departure_date, $return_date, $flight_details, $hotel_details);
  
  $destination = $_POST['destination'];
  $departure_date = $_POST['departure_date'];
  $return_date = $_POST['return_date'];
  $flight_details = $_POST['flight_details'];
  $hotel_details = $_POST['hotel_details'];
  
  $stmt->execute();
  $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Travel Plan App</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; }
        .container { width: 80%; margin: auto; background-color: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input, textarea, button { display: block; width: 100%; padding: 10px; margin-bottom: 10px; }
    </style>
</head>
<body>
<div class="container">
    <h2>Create Travel Plan</h2>
    <form method="post">
        <label for="destination">Destination</label>
        <input type="text" id="destination" name="destination" required>
        
        <label for="departure_date">Departure Date</label>
        <input type="date" id="departure_date" name="departure_date" required>
        
        <label for="return_date">Return Date</label>
        <input type="date" id="return_date" name="return_date" required>
        
        <label for="flight_details">Flight Details</label>
        <textarea id="flight_details" name="flight_details" required></textarea>
        
        <label for="hotel_details">Hotel Details</label>
        <textarea id="hotel_details" name="hotel_details" required></textarea>
        
        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>

<?php
// Closing the database connection
$conn->close();
?>
