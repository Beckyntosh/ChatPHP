
<?php
// Initialize database connection
$servername = "db";
$database = "my_database";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for Itinerary if it does not exist
$itineraryTable = "CREATE TABLE IF NOT EXISTS Itinerary (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(30) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_details TEXT NOT NULL,
    hotel_details TEXT NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($itineraryTable) === TRUE) {
    // echo "Table Itinerary created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle form data on submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST["destination"];
    $departure_date = $_POST["departure_date"];
    $return_date = $_POST["return_date"];
    $flight_details = $_POST["flight_details"];
    $hotel_details = $_POST["hotel_details"];

    $sql = "INSERT INTO Itinerary (destination, departure_date, return_date, flight_details, hotel_details)
    VALUES ('$destination', '$departure_date', '$return_date', '$flight_details', '$hotel_details')";

    if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Itinerary Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
        }
        input[type=text], input[type=date] {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Add Travel Itinerary</h2>
    <form method="POST">
        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination" required>

        <label for="departure_date">Departure Date:</label>
        <input type="date" id="departure_date" name="departure_date" required>

        <label for="return_date">Return Date:</label>
        <input type="date" id="return_date" name="return_date" required>

        <label for="flight_details">Flight Details:</label>
        <input type="text" id="flight_details" name="flight_details" required>

        <label for="hotel_details">Hotel Details:</label>
        <input type="text" id="hotel_details" name="hotel_details" required>

        <input type="submit" value="Add Itinerary">
    </form>
</div>
</body>
</html>

<?php
$conn->close();
?>
