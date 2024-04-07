


<?php
// PHP code to handle logic
$servername = "db";
$username = "root";
$password = "root"; // Replace 'root' with MYSQL_ROOT_PSWD value
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create the travel details tables if not exist
$sql = "CREATE TABLE IF NOT EXISTS Flights (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
departure_time DATETIME NOT NULL,
return_time DATETIME NOT NULL
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS Hotels (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50),
check_in_date DATE,
check_out_date DATE
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Insert or update travel details in the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $destination = $_POST['destination'];
  $departureTime = $_POST['departureTime'];
  $returnTime = $_POST['returnTime'];
  $hotelName = $_POST['hotelName'];
  $checkInDate = $_POST['checkInDate'];
  $checkOutDate = $_POST['checkOutDate'];

  // Insert flight detail
  $stmt = $conn->prepare("INSERT INTO Flights (destination, departure_time, return_time) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $destination, $departureTime, $returnTime);
  $stmt->execute();

  // Insert hotel detail
  $stmt = $conn->prepare("INSERT INTO Hotels (name, check_in_date, check_out_date) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $hotelName, $checkInDate, $checkOutDate);
  $stmt->execute();

  $stmt->close();
  echo "Travel details saved successfully";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Travel Itinerary</title>
</head>
<body>
    <h1>Create Your Paris Trip Itinerary</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <h2>Flight Details</h2>
        Destination: <input type="text" name="destination" value="Paris" readonly><br>
        Departure Time: <input type="datetime-local" name="departureTime"><br>
        Return Time: <input type="datetime-local" name="returnTime"><br>

        <h2>Hotel Details</h2>
        Hotel Name: <input type="text" name="hotelName"><br>
        Check-in Date: <input type="date" name="checkInDate"><br>
        Check-out Date: <input type="date" name="checkOutDate"><br>

        <input type="submit">
    </form>
</body>
</html>

This is a very basic example and doesn't cover many best practices for modern web development, such as input validation, security measures against SQL injections, separation of concerns, and use of templates or frameworks. For any serious project, especially one related to Ph.D. research, consider adopting a more structured approach and leveraging more secure and scalable frameworks and methodologies.