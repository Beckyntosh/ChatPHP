

<?php
// Database connection setup
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "root");
define("MYSQL_DATABASE", "my_database");
define("MYSQL_SERVER", "db");

$connection = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if the travel_plans table exists, create if not
$createTable = "CREATE TABLE IF NOT EXISTS travel_plans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(255) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_details TEXT,
    hotel_details TEXT
)";

if (!$connection->query($createTable)) {
    die("Error creating table: " . $connection->error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $connection->real_escape_string($_POST['destination']);
    $departure_date = $connection->real_escape_string($_POST['departure_date']);
    $return_date = $connection->real_escape_string($_POST['return_date']);
    $flight_details = $connection->real_escape_string($_POST['flight_details']);
    $hotel_details = $connection->real_escape_string($_POST['hotel_details']);

    $insertSql = "INSERT INTO travel_plans (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('$destination', '$departure_date', '$return_date', '$flight_details', '$hotel_details')";

    if (!$connection->query($insertSql)) {
        echo "Error: " . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Travel Plan App</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #f0e8d9;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create Your Travel Plan</h2>
        <form action="" method="POST">
            <label for="destination">Destination:</label><br>
            <input type="text" id="destination" name="destination" required><br>
            <label for="departure_date">Departure Date:</label><br>
            <input type="date" id="departure_date" name="departure_date" required><br>
            <label for="return_date">Return Date:</label><br>
            <input type="date" id="return_date" name="return_date" required><br>
            <label for="flight_details">Flight Details:</label><br>
            <textarea id="flight_details" name="flight_details" rows="4"></textarea><br>
            <label for="hotel_details">Hotel Details:</label><br>
            <textarea id="hotel_details" name="hotel_details" rows="4"></textarea><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>

<?php
$connection->close();
?>

Ensure you replace `MYSQL_USER`, `MYSQL_PASSWORD`, `MYSQL_DATABASE`, and `MYSQL_SERVER` with your actual database credentials and server information. Additionally, you might want to set up your `php.ini` and web server configuration appropriately to support MySQL and ensure your environment is secure for handling user inputs and database operations.