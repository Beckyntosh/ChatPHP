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

// Create Travel Plans table if not exists
$sql = "CREATE TABLE IF NOT EXISTS TravelPlans (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
departure_date DATE NOT NULL,
return_date DATE NOT NULL,
flight_details TEXT NOT NULL,
hotel_details TEXT NOT NULL,
creation_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $destination = $_POST['destination'];
  $departure_date = $_POST['departure_date'];
  $return_date = $_POST['return_date'];
  $flight_details = $_POST['flight_details'];
  $hotel_details = $_POST['hotel_details'];

  $stmt = $conn->prepare("INSERT INTO TravelPlans (destination, departure_date, return_date, flight_details, hotel_details) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $destination, $departure_date, $return_date, $flight_details, $hotel_details);
 
  if($stmt->execute()) {
    echo "<p>Travel plan added successfully</p>";
  } else {
    echo "<p>Error adding travel plan: " . $stmt->error . "</p>";
  }
  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Plan App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 20px;
        }
        form, .display-plans {
            background: #fff;
            padding: 20px;
            margin-bottom: 20px;
        }
        input[type=text], input[type=date], textarea {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
        }
        input[type=submit] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background: #333;
            color: #fff;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background: #555;
        }
    </style>
</head>
<body>
    <h1>Plan Your Travel</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <input type="text" name="destination" placeholder="Destination" required>
        <input type="date" name="departure_date" placeholder="Departure Date" required>
        <input type="date" name="return_date" placeholder="Return Date" required>
        <textarea name="flight_details" placeholder="Flight Details" required></textarea>
        <textarea name="hotel_details" placeholder="Hotel Details" required></textarea>
        <input type="submit" value="Add Travel Plan">
    </form>
</body>
</html>
