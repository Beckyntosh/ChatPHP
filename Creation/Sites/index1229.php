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

// Create travel details table if it doesn't exist
$tripTable = "CREATE TABLE IF NOT EXISTS travel_details (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    flight_info VARCHAR(255),
    hotel_info VARCHAR(255),
    reg_date TIMESTAMP
    )";

if (!$conn->query($tripTable)) {
    echo "Error creating table: " . $conn->error;
}

// Insert new travel entry if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST['destination'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $flight_info = $_POST['flight_info'];
    $hotel_info = $_POST['hotel_info'];

    $sql = "INSERT INTO travel_details (destination, start_date, end_date, flight_info, hotel_info)
    VALUES ('$destination', '$start_date', '$end_date', '$flight_info', '$hotel_info')";

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
    <style>
        body { font-family: Verdana, sans-serif; background-color: #f0f0f0; color: #333; }
        .container { width: 50%; margin: auto; background-color: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { color: #333; }
        label { font-weight: bold; }
        input[type=text], input[type=date] { width: 100%; padding: 10px; margin: 5px 0 20px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type=submit] { width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="container">
  <h2>Create a Basic Travel Plan</h2>
  <form method="post">
    <label for="destination">Destination:</label>
    <input type="text" id="destination" name="destination" required>

    <label for="start_date">Start Date:</label>
    <input type="date" id="start_date" name="start_date" required>
    
    <label for="end_date">End Date:</label>
    <input type="date" id="end_date" name="end_date" required>
    
    <label for="flight_info">Flight Info:</label>
    <input type="text" id="flight_info" name="flight_info">
    
    <label for="hotel_info">Hotel Info:</label>
    <input type="text" id="hotel_info" name="hotel_info">
    
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>

<?php
$conn->close();
?>
