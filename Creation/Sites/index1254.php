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
    flight_info TEXT NOT NULL,
    hotel_info TEXT NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // echo "Table travel_plan created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST['destination'];
    $departure_date = $_POST['departure_date'];
    $return_date = $_POST['return_date'];
    $flight_info = $_POST['flight_info'];
    $hotel_info = $_POST['hotel_info'];
    
    $sql = "INSERT INTO travel_plan (destination, departure_date, return_date, flight_info, hotel_info)
    VALUES ('$destination', '$departure_date', '$return_date', '$flight_info', '$hotel_info')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Plan App</title>
    <style>
        body {font-family: Arial, sans-serif;}
        .container {width: 50%; margin: auto; padding-top: 20px;}
        input, textarea {width: 100%; margin-bottom: 20px; padding: 10px;}
        input[type="submit"] {background-color: #4CAF50; color: white; cursor: pointer;}
        input[type="submit"]:hover {background-color: #45a049;}
    </style>
</head>
<body>
<div class="container">
    <h2>Travel Plan</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="text" name="destination" placeholder="Destination" required>
        <input type="date" name="departure_date" placeholder="Departure Date" required>
        <input type="date" name="return_date" placeholder="Return Date" required>
        <textarea name="flight_info" placeholder="Flight Information" required></textarea>
        <textarea name="hotel_info" placeholder="Hotel Information" required></textarea>
        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>
