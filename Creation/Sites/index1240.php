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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS TravelPlans (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
flight VARCHAR(50),
hotel VARCHAR(50),
user_id INT(6) UNSIGNED,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table TravelPlans created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $destination = $_POST['destination'];
  $flight = $_POST['flight'];
  $hotel = $_POST['hotel'];
  $user_id = 1; // Static user id for simplification

  $stmt = $conn->prepare("INSERT INTO TravelPlans (destination, flight, hotel, user_id) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("sssi", $destination, $flight, $hotel, $user_id);

  if ($stmt->execute() === TRUE) {
    echo "<p>New record created successfully</p>";
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
<title>Basic Travel Plan App</title>
<style>
body { font-family: Arial, sans-serif; }
.container { width: 80%; margin: auto; }
input[type=text], input[type=submit] { padding: 10px; margin: 10px; }
</style>
</head>
<body>

<div class="container">
  <h2>Travel Plan for Paris</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <label for="destination">Destination:</label>
    <input type="text" name="destination" id="destination" required><br>
    <label for="flight">Flight:</label>
    <input type="text" name="flight" id="flight" required><br>
    <label for="hotel">Hotel:</label>
    <input type="text" name="hotel" id="hotel" required><br>
    <input type="submit" value="Save Travel Plan">
  </form>
</div>

</body>
</html>
