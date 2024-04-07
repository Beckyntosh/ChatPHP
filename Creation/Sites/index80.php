<?php
// Simple Travel Destination Search with Geolocation for an Art Supplies Website

$mysqlRootPswd = 'root';
$mysqlDb = 'my_database';
$servername = 'db';

// Connect to database
$conn = new mysqli($servername, 'root', $mysqlRootPswd, $mysqlDb);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create destinations table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS destinations (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  description TEXT,
  latitude DECIMAL(10, 8),
  longitude DECIMAL(11, 8),
  reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table destinations created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check for POST request to add a new destination
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
  $name = $conn->real_escape_string($_POST['name']);
  $description = $conn->real_escape_string($_POST['description']);
  $latitude = (float)$_POST['latitude'];
  $longitude = (float)$_POST['longitude'];
  
  $sql = "INSERT INTO destinations (name, description, latitude, longitude)
  VALUES ('$name', '$description', $latitude, $longitude)";
  
  if ($conn->query($sql) === TRUE) {
    echo "New destination added successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Art Supplies - Travel Destination Search</title>
  <style>
    /* Paranoid Style CSS */
    body {
      background-color: #000;
      color: #0f0;
      font-family: 'Courier New', Courier, monospace;
    }
    input, textarea {
      background-color: #222;
      color: #0f0;
      border: 1px solid #0f0;
    }
  </style>
</head>
<body>

<h2>Add a New Travel Destination</h2>
<form method="post">
  Name: <input type="text" name="name" required><br>
  Description: <textarea name="description"></textarea><br>
  Latitude: <input type="text" name="latitude" required><br>
  Longitude: <input type="text" name="longitude" required><br>
  <input type="submit" value="Add Destination">
</form>

<h2>Search for Destinations</h2>
<form method="get">
  <input type="text" name="search" placeholder="Search...">
  <input type="submit" value="Search">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search'])) {
  $search = $conn->real_escape_string($_GET['search']);
  $sql = "SELECT * FROM destinations WHERE name LIKE '%$search%' OR description LIKE '%$search%'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
      echo "<li>" . $row["name"]. " - " . $row["description"]. " [" . $row["latitude"]. ", " . $row["longitude"]. "]</li>";
    }
    echo "</ul>";
  } else {
    echo "0 results";
  }
}
$conn->close();
?>

</body>
</html>