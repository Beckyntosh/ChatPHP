<?php
// Simplifying the configuration and setup, directly including password and database details (Note: Not recommended for production)
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
$createTable = "CREATE TABLE IF NOT EXISTS travel_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    flight VARCHAR(100),
    hotel VARCHAR(100),
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($createTable)) {
    echo "Error creating table: " . $conn->error;
}

// Handle form data on submission
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST['destination'];
    $flight = $_POST['flight'];
    $hotel = $_POST['hotel'];
    
    $sql = "INSERT INTO travel_plans (destination, flight, hotel) VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    
    if($stmt) {
        $stmt->bind_param("sss", $destination, $flight, $hotel);
        $stmt->execute();
        $stmt->close();
        echo "<div>Travel plan saved</div>";
    } else {
        echo "<div>Failed to save plan: " . $conn->error . "</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Plan App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Plan Your Trip</h2>
    <form method="post">
        <label for="destination">Destination:</label><br>
        <input type="text" id="destination" name="destination" required><br>
        <label for="flight">Flight:</label><br>
        <input type="text" id="flight" name="flight"><br>
        <label for="hotel">Hotel:</label><br>
        <input type="text" id="hotel" name="hotel"><br><br>
        <input type="submit" value="Save Travel Plan">
    </form>
</div>
</body>
</html>

<?php $conn->close(); ?>
Note: When deploying and running PHP code that interacts with a database, ensure you have the appropriate server, PHP, and MySQL versions installed, and the connection details accurately match your server's configuration. This code is a simple example and lacks security features like input validation and does not follow best practices for production environments, such as avoiding the direct usage of root database credentials in the code.