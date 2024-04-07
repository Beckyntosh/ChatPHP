<?php
// Simple Travel Plan App - Single File Approach (PHP & MySQL)

// Define database connection parameters
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
$tableSql = "CREATE TABLE IF NOT EXISTS travel_plan (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_details TEXT,
    hotel_details TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($tableSql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Insert form data into database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST['destination'];
    $departure = $_POST['departure'];
    $return = $_POST['return'];
    $flight = $_POST['flight'];
    $hotel = $_POST['hotel'];

    $insertSql = "INSERT INTO travel_plan (destination, departure_date, return_date, flight_details, hotel_details)
    VALUES ('$destination', '$departure', '$return', '$flight', '$hotel')";

    if ($conn->query($insertSql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Plan App</title>
</head>
<body>
    <h2>Create your travel plan</h2>
    <form method="POST">
        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination" required>
        
        <label for="departure">Departure Date:</label>
        <input type="date" id="departure" name="departure" required>
        
        <label for="return">Return Date:</label>
        <input type="date" id="return" name="return" required>
        
        <label for="flight">Flight Details:</label>
        <textarea id="flight" name="flight" required></textarea>
        
        <label for="hotel">Hotel Details:</label>
        <textarea id="hotel" name="hotel" required></textarea>

        <input type="submit" value="Submit">
    </form>
    
    <h2>Travel Plans</h2>
    <?php
    $selectSql = "SELECT destination, departure_date, return_date, flight_details, hotel_details FROM travel_plan";
    $result = $conn->query($selectSql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Destination: " . $row["destination"]. " - Departure: " . $row["departure_date"]. " - Return: " . $row["return_date"]. "<br>Flight Details: " . $row["flight_details"]. "<br>Hotel Details: " . $row["hotel_details"]. "<br><br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</body>
</html>
