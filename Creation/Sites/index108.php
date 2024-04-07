<?php

// Connection variables
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

// Create tables if they don't exist
$tablesSql = "CREATE TABLE IF NOT EXISTS destinations (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  country VARCHAR(30) NOT NULL,
  description TEXT,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  );
  CREATE TABLE IF NOT EXISTS accommodations (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  destination_id INT(6) UNSIGNED,
  name VARCHAR(50),
  booking_details TEXT,
  FOREIGN KEY (destination_id) REFERENCES destinations(id)
  );
  CREATE TABLE IF NOT EXISTS activities (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  destination_id INT(6) UNSIGNED,
  name VARCHAR(50),
  description TEXT,
  FOREIGN KEY (destination_id) REFERENCES destinations(id)
  );";

if ($conn->multi_query($tablesSql)) {
  do {
    if ($result = $conn->store_result()) {
      $result->free();
    }
  } while ($conn->more_results() && $conn->next_result());
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"] ?? '';
  $country = $_POST["country"] ?? '';
  $description = $_POST["description"] ?? '';
  $insertSql = "INSERT INTO destinations (name, country, description)
  VALUES ('$name', '$country', '$description')";
  
  if ($conn->query($insertSql) === TRUE) {
    echo "<script>alert('New record created successfully');</script>";
  } else {
    echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Travel Itinerary Planner</title>
  <style>
    body { font-family: Arial, sans-serif; }
    .container { width: 80%; margin: 0 auto; }
    form { display: flex; flex-direction: column; max-width: 300px; }
    label, input { margin-bottom: 10px; }
    #submit { cursor: pointer; }
  </style>
</head>
<body>
  <div class="container">
    <h1>Travel Itinerary Planner</h1>
    <form action="" method="post">
      <label for="name">Destination Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="country">Country:</label>
      <input type="text" id="country" name="country" required>

      <label for="description">Description:</label>
      <textarea id="description" name="description"></textarea>

      <input type="submit" id="submit" value="Add Destination">
    </form>
  </div>
</body>
</html>