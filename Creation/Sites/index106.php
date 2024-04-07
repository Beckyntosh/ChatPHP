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

// sql to create table
$sql = "CREATE TABLE IF NOT EXISTS TravelItinerary (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(50) NOT NULL,
accommodation VARCHAR(50),
activities TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $destination = $_POST['destination'];
  $accommodation = $_POST['accommodation'];
  $activities = $_POST['activities'];

  $stmt = $conn->prepare("INSERT INTO TravelItinerary (destination, accommodation, activities) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $destination, $accommodation, $activities);

  if($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Travel Itinerary</title>
</head>
<body>
    <h2>Create a Travel Itinerary</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Destination: <input type="text" name="destination" required><br><br>
        Accommodation: <input type="text" name="accommodation"><br><br>
        Activities: <textarea name="activities" rows="5" cols="40"></textarea><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>