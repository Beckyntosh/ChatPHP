<?php
// Connect to database
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
$sql = "CREATE TABLE IF NOT EXISTS travel_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(100) NOT NULL,
    departure_date DATE,
    return_date DATE,
    flight VARCHAR(255),
    hotel VARCHAR(255),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST['destination'];
    $departure_date = $_POST['departure_date'];
    $return_date = $_POST['return_date'];
    $flight = $_POST['flight'];
    $hotel = $_POST['hotel'];

    $stmt = $conn->prepare("INSERT INTO travel_plans (destination, departure_date, return_date, flight, hotel) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $destination, $departure_date, $return_date, $flight, $hotel);
    
    if ($stmt->execute() === TRUE) {
        echo "<p>Travel plan saved successfully!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Travel Planner</title>
    <style>
        body{ font-family: Arial, sans-serif; }
        .container{ width: 80%; margin: auto; }
        h2{ text-align: center; }
        form{ 
            display: flex;
            flex-direction: column;
            width: 50%;
            margin: auto;
        }
        input, button{
            margin: 10px 0;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Basic Travel Plan App</h2>
        <form action="" method="post">
            <input type="text" name="destination" placeholder="Destination" required>
            <input type="date" name="departure_date" placeholder="Departure Date" required>
            <input type="date" name="return_date" placeholder="Return Date" required>
            <input type="text" name="flight" placeholder="Flight Details" required>
            <input type="text" name="hotel" placeholder="Hotel Details" required>
            <button type="submit">Save Travel Plan</button>
        </form>
    </div>
</body>
</html>
