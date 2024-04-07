<?php
$servername = "db";
$username = "root";
$password = "root"; // Note for production: It's highly recommended to use environment variables for sensitive information like passwords
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS travel_itinerary (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
flight VARCHAR(50),
hotel VARCHAR(50),
visit_date DATE,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST['destination'];
    $flight = $_POST['flight'];
    $hotel = $_POST['hotel'];
    $visit_date = $_POST['visit_date'];

    $stmt = $conn->prepare("INSERT INTO travel_itinerary (destination, flight, hotel, visit_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $destination, $flight, $hotel, $visit_date);

    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt . "<br>" . $conn->error;
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Itinerary</title>
    <style>
        /* Grateful style CSS */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e6f6;
            color: #333;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,.1);
        }
        input[type=text], input[type=date] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
  <h2>Create Travel Itinerary</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <label for="destination">Destination</label>
    <input type="text" id="destination" name="destination" required>

    <label for="flight">Flight</label>
    <input type="text" id="flight" name="flight" required>

    <label for="hotel">Hotel</label>
    <input type="text" id="hotel" name="hotel" required>

    <label for="visit_date">Visit Date</label>
    <input type="date" id="visit_date" name="visit_date" required>
    
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>
