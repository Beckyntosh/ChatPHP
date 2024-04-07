<?php

// Basic configuration
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

// Create table for vehicles if not exists
$createTable = "CREATE TABLE IF NOT EXISTS vehicles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  model VARCHAR(255) NOT NULL,
  year INT(4) NOT NULL,
  maintenance_schedule TEXT NOT NULL
)";

if (!$conn->query($createTable)) {
  die("Error creating table: " . $conn->error);
}

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $model = $_POST['model'] ?? '';
  $year = $_POST['year'] ?? '';
  $maintenance_schedule = $_POST['maintenance_schedule'] ?? '';

  $stmt = $conn->prepare("INSERT INTO vehicles (model, year, maintenance_schedule) VALUES (?, ?, ?)");
  $stmt->bind_param("sis", $model, $year, $maintenance_schedule);

  if ($stmt->execute()) {
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
  <title>Add Vehicle to Fleet Management</title>
  <style>
    body { font-family: Arial, sans-serif; }
    .container { width: 600px; margin: 50px auto; }
    .input-group { margin-bottom: 10px; }
    .input-group label { display: block; }
    .input-group input, .input-group textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; }
    .input-group textarea { resize: vertical; }
    button { padding: 10px 20px; background-color: #0056b3; color: white; border: none; border-radius: 5px; cursor: pointer; }
    button:hover { background-color: #003d82; }
  </style>
</head>
<body>
<div class="container">
  <h2>Add New Vehicle</h2>
  <form action="#" method="post">
    <div class="input-group">
      <label for="model">Model:</label>
      <input type="text" id="model" name="model" required>
    </div>
    <div class="input-group">
      <label for="year">Year:</label>
      <input type="number" id="year" name="year" min="1900" max="2099" step="1" required>
    </div>
    <div class="input-group">
      <label for="maintenance_schedule">Maintenance Schedule:</label>
      <textarea id="maintenance_schedule" name="maintenance_schedule" required></textarea>
    </div>
    <button type="submit">Add Vehicle</button>
  </form>
</div>
</body>
</html>
