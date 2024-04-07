<?php
// Connection parameters
$servername = 'db';
$username = 'root';
$password = 'root';
$dbname = 'my_database';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$table = "CREATE TABLE IF NOT EXISTS paint_calculations (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
room_width FLOAT NOT NULL,
room_length FLOAT NOT NULL,
room_height FLOAT NOT NULL,
coats INT NOT NULL,
total_paint_needed FLOAT,
reg_date TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Check for submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $room_width = $_POST['room_width'];
  $room_length = $_POST['room_length'];
  $room_height = $_POST['room_height'];
  $coats = $_POST['coats'];
  
  // Calculate paint needed
  $total_area = (2 * ($room_width * $room_height)) + (2 * ($room_length * $room_height)) + ($room_width * $room_length);
  $total_paint_needed = ($total_area / 350) * $coats; // Assuming one gallon covers 350 square feet
  
  // Insert into database
  $stmt = $conn->prepare("INSERT INTO paint_calculations (room_width, room_length, room_height, coats, total_paint_needed) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("dddd", $room_width, $room_length, $room_height, $coats, $total_paint_needed);
  $stmt->execute();
  
  echo "Total paint needed: " . $total_paint_needed . " gallons";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paint Coverage Calculator</title>
</head>
<body>
    <h2>Calculate Paint Required</h2>
    <form action="" method="post">
        Room Width (ft): <input type="number" name="room_width" step="0.1" required><br>
        Room Length (ft): <input type="number" name="room_length" step="0.1" required><br>
        Room Height (ft): <input type="number" name="room_height" step="0.1" required><br>
        Coats of Paint: <input type="number" name="coats" required><br>
        <input type="submit">
    </form>
</body>
</html>