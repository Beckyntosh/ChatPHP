<?php
// Initialize the database connection
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

// Create itinerary table if not exists
$sql = "CREATE TABLE IF NOT EXISTS travel_itinerary (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_details TEXT NOT NULL,
    hotel_details TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $destination = $_POST['destination'];
    $departure_date = $_POST['departure_date'];
    $return_date = $_POST['return_date'];
    $flight_details = $_POST['flight_details'];
    $hotel_details = $_POST['hotel_details'];

    $sql = "INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details)
    VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $destination, $departure_date, $return_date, $flight_details, $hotel_details);

    if ($stmt->execute() === TRUE) {
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Itinerary</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; overflow: hidden; }
        form { margin: 30px auto; padding: 20px; border: 1px solid #ccc; }
        input, textarea { width: 100%; margin-bottom: 20px; padding: 10px; }
        input[type=submit] { background: #55c57a; color: white; cursor: pointer; }
        input[type=submit]:hover { background: #28b485; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Your Travel Itinerary</h2>
        <form action="" method="post">
            <input type="text" name="destination" placeholder="Destination (e.g., Paris)" required>
            <input type="date" name="departure_date" placeholder="Departure Date" required>
            <input type="date" name="return_date" placeholder="Return Date" required>
            <textarea name="flight_details" placeholder="Flight Details" required></textarea>
            <textarea name="hotel_details" placeholder="Hotel Details" required></textarea>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
