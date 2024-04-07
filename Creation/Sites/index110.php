<?php
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

// Attempt to create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS travel_itinerary (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
accommodations VARCHAR(100) NOT NULL,
activities TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table travel_itinerary created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST["destination"];
    $accommodations = $_POST["accommodations"];
    $activities = $_POST["activities"];
    
    $stmt = $conn->prepare("INSERT INTO travel_itinerary (destination, accommodations, activities) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $destination, $accommodations, $activities);
    $stmt->execute();
    
    echo "New itinerary added successfully";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Itinerary Form</title>
</head>
<body>
    <h2>Travel Itinerary Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="destination">Destination:</label><br>
        <input type="text" id="destination" name="destination" required><br>
        <label for="accommodations">Accommodations:</label><br>
        <input type="text" id="accommodations" name="accommodations" required><br>
        <label for="activities">Activities:</label><br>
        <textarea id="activities" name="activities" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>