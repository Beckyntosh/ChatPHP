<?php
// Simple Single-file CRUD for a Travel Planning App
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
$sql = "CREATE TABLE IF NOT EXISTS travel_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    destination VARCHAR(30) NOT NULL,
    flight_details VARCHAR(255),
    hotel_details VARCHAR(255),
    reg_date TIMESTAMP
    )";

if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Handling form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST['destination'];
    $flight_details = $_POST['flight_details'];
    $hotel_details = $_POST['hotel_details'];

    $stmt = $conn->prepare("INSERT INTO travel_plans (destination, flight_details, hotel_details) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $destination, $flight_details, $hotel_details);

    if($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Planner</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; color: #333;}
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input[type=text], input[type=submit] { width: 100%; padding: 10px; margin: 10px 0; }
        input[type=submit] { background-color: #4CAF50; color: white; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Travel Plan to Paris</h2>
        <form action="" method="post">
            <label for="destination">Destination:</label>
            <input type="text" id="destination" name="destination" placeholder="Paris" required>
            <label for="flight_details">Flight Details:</label>
            <input type="text" id="flight_details" name="flight_details" placeholder="Flight number, departure, arrival" required>
            <label for="hotel_details">Hotel Details:</label>
            <input type="text" id="hotel_details" name="hotel_details" placeholder="Hotel name, check-in, check-out" required>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
