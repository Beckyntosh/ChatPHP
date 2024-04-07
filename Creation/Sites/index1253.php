<?php
// Define server details and database credentials
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

// Create the travel plan table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS travel_plan (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    flight VARCHAR(100),
    hotel VARCHAR(100),
    reg_date TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
  // echo "Table travel_plan created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $destination = $_POST['destination'];
  $flight = $_POST['flight'];
  $hotel = $_POST['hotel'];

  $sql = "INSERT INTO travel_plan (destination, flight, hotel)
  VALUES ('$destination', '$flight', '$hotel')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Skateboarders' Travel Planner</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        color: #333;
    }
    .container {
        width: 80%;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0px 0px 10px #aaa;
    }
    .form-input {
        margin-bottom: 10px;
    }
    .form-input input, .form-input textarea, .form-input button {
        width: 100%;
        padding: 10px;
        margin-top: 2px;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Skateboarders' Trip Planner to Paris</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-input">
            <label for="destination">Destination:</label>
            <input type="text" id="destination" name="destination" value="Paris" readonly>
        </div>
        <div class="form-input">
            <label for="flight">Flight Details:</label>
            <input type="text" id="flight" name="flight" placeholder="Enter flight details">
        </div>
        <div class="form-input">
            <label for="hotel">Hotel Details:</label>
            <input type="text" id="hotel" name="hotel" placeholder="Enter hotel details">
        </div>
        <div class="form-input">
            <button type="submit">Save Travel Plan</button>
        </div>
    </form>
</div>
</body>
</html>
