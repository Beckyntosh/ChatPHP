<?php
// Quick setup for example purposes
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
$sql = "CREATE TABLE IF NOT EXISTS fleet_vehicles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    vehicle_name VARCHAR(50) NOT NULL,
    maintenance_schedule DATE NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $vehicle_name = $_POST["vehicle_name"];
  $maintenance_schedule = $_POST["maintenance_schedule"];

  $sql = "INSERT INTO fleet_vehicles (vehicle_name, maintenance_schedule)
  VALUES ('$vehicle_name', '$maintenance_schedule')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('New record created successfully');</script>";
  } else {
    echo "<script>alert('Error: ".$conn->error."');</script>";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Vehicle to Fleet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007bff;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group input[type=submit] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        .form-group input[type=submit]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Vehicle to Fleet</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
                <label for="vehicle_name">Vehicle Name:</label>
                <input type="text" id="vehicle_name" name="vehicle_name" required>
            </div>
            <div class="form-group">
                <label for="maintenance_schedule">Maintenance Schedule:</label>
                <input type="date" id="maintenance_schedule" name="maintenance_schedule" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Add Vehicle">
            </div>
        </form>
    </div>
</body>
</html>
