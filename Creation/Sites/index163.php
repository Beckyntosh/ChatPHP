<?php
// Simple Fleet Management Application - Add Vehicle Feature

// Database connection parameters
$dbServername = "db";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "my_database";

// Establishing connection to the database
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create vehicles table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS vehicles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
make VARCHAR(30) NOT NULL,
model VARCHAR(30) NOT NULL,
year INT(4) NOT NULL,
maintenance_schedule VARCHAR(255),
usage_tracking VARCHAR(255),
reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $make = $_POST['make'];
  $model = $_POST['model'];
  $year = $_POST['year'];
  $maintenance_schedule = $_POST['maintenance_schedule'];
  $usage_tracking = $_POST['usage_tracking'];

  // Insert vehicle into database
  $sql = "INSERT INTO vehicles (make, model, year, maintenance_schedule, usage_tracking)
  VALUES ('$make', '$model', '$year', '$maintenance_schedule', '$usage_tracking')";

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vehicle to Fleet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        h1, h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type='text'],
        .form-group input[type='number'],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group input[type='submit'] {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #333;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
        .form-group input[type='submit']:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add New Vehicle</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="make">Make</label>
                <input type="text" name="make" id="make" required>
            </div>
            <div class="form-group">
                <label for="model">Model</label>
                <input type="text" name="model" id="model" required>
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" name="year" id="year" required>
            </div>
            <div class="form-group">
                <label for="maintenance_schedule">Maintenance Schedule</label>
                <textarea name="maintenance_schedule" id="maintenance_schedule" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="usage_tracking">Usage Tracking</label>
                <textarea name="usage_tracking" id="usage_tracking" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Add Vehicle">
            </div>
        </form>
    </div>
</body>
</html>