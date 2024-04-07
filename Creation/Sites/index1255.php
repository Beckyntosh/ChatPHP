<?php

$serverName = "db";
$username = "root";
$password = "root";
$dbName = "my_database";

// Create connection
$conn = new mysqli($serverName, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS travel_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(30) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_info TEXT,
    hotel_info TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($tableSql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST['destination'];
    $departureDate = $_POST['departure_date'];
    $returnDate = $_POST['return_date'];
    $flightInfo = $_POST['flight_info'];
    $hotelInfo = $_POST['hotel_info'];

    $insertSql = "INSERT INTO travel_plans (destination, departure_date, return_date, flight_info, hotel_info)
    VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("sssss", $destination, $departureDate, $returnDate, $flightInfo, $hotelInfo);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Plan App</title>
</head>
<body>
    <h2>Create a Travel Plan</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Destination: <input type="text" name="destination" required><br>
        Departure Date: <input type="date" name="departure_date" required><br>
        Return Date: <input type="date" name="return_date" required><br>
        Flight Info: <textarea name="flight_info" rows="5" cols="40"></textarea><br>
        Hotel Info: <textarea name="hotel_info" rows="5" cols="40"></textarea><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
