<?php
// Connect to Database
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

// Create table if it does not exist
$table = "CREATE TABLE IF NOT EXISTS TravelPlan (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(30) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_info TEXT,
    hotel_info TEXT,
    reg_date TIMESTAMP
    )";

if ($conn->query($table) === TRUE) {
    //echo "Table TravelPlan created successfully";
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

    $sql = "INSERT INTO TravelPlan (destination, departure_date, return_date, flight_info, hotel_info)
    VALUES ('$destination', '$departure_date', '$return_date', '$flight_info', '$hotel_info')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Plan</title>
</head>
<body>
    <h2>Enter your travel plan:</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Destination: <input type="text" name="destination" required><br><br>
        Departure Date: <input type="date" name="departure_date" required><br><br>
        Return Date: <input type="date" name="return_date" required><br><br>
        Flight Information: <textarea name="flight_info" rows="4"></textarea><br><br>
        Hotel Information: <textarea name="hotel_info" rows="4"></textarea><br><br>
        <input type="submit" value="Submit">
    </form>

    <h2>Travel Plans:</h2>
    <?php
    $sql = "SELECT id, destination, departure_date, return_date, flight_info, hotel_info FROM TravelPlan";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row["destination"]. " - From: " . $row["departure_date"]. " - To: " . $row["return_date"]. "<br>Flight Info: " . $row["flight_info"]. "<br>Hotel Info: " . $row["hotel_info"]. "</li>";
        }
        echo "</ul>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</body>
</html>
