<?php
// Define MYSQL connection parameters
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "root");
define("MYSQL_DATABASE", "my_database");
define("MYSQL_SERVER", "db");

// Establish connection to the database
$conn = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they do not exist
$travelPlansTable = "CREATE TABLE IF NOT EXISTS travel_plans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(255) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flights_details TEXT,
    hotel_details TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($travelPlansTable)) {
    die("Error creating table: " . $conn->error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $conn->real_escape_string($_POST['destination']);
    $departure_date = $conn->real_escape_string($_POST['departure_date']);
    $return_date = $conn->real_escape_string($_POST['return_date']);
    $flights_details = $conn->real_escape_string($_POST['flights_details']);
    $hotel_details = $conn->real_escape_string($_POST['hotel_details']);

    $insertQuery = "INSERT INTO travel_plans (destination, departure_date, return_date, flights_details, hotel_details)
    VALUES ('$destination', '$departure_date', '$return_date', '$flights_details', '$hotel_details')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "<p>New travel plan created successfully</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Planner</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type=text], input[type=date], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type=submit] {
            width: 100%;
            background-color: #004a99;
            color: white;
            padding: 14px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #003366;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create your travel plan</h2>
        <form method="POST" action="">
            <label for="destination">Destination:</label>
            <input type="text" id="destination" name="destination" required>

            <label for="departure_date">Departure Date:</label>
            <input type="date" id="departure_date" name="departure_date" required>

            <label for="return_date">Return Date:</label>
            <input type="date" id="return_date" name="return_date" required>

            <label for="flights_details">Flight Details:</label>
            <textarea id="flights_details" name="flights_details" rows="4" required></textarea>

            <label for="hotel_details">Hotel Details:</label>
            <textarea id="hotel_details" name="hotel_details" rows="4" required></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
<?php
$conn->close();
?>
