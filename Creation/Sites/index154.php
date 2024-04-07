<?php
// Define the database settings
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Attempt to connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for clients if it doesn't exist
$clientTableSql = "CREATE TABLE IF NOT EXISTS clients (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  phone VARCHAR(255),
  address TEXT,
  registration_date TIMESTAMP
)";

if (!$conn->query($clientTableSql)) {
  die("Error creating table: " . $conn->error);
}

// Create table for interaction logs if it doesn't exist
$interactionLogTableSql = "CREATE TABLE IF NOT EXISTS interaction_logs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  client_id INT,
  interaction_date TIMESTAMP,
  notes TEXT,
  FOREIGN KEY (client_id) REFERENCES clients(id)
)";

if (!$conn->query($interactionLogTableSql)) {
  die("Error creating table: " . $conn->error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Insert client into the database
  $stmt = $conn->prepare("INSERT INTO clients (name, email, phone, address) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $name, $email, $phone, $address);
  
  // Parameters
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  
  if ($stmt->execute()) {
    echo "Client added successfully.";
  } else {
    echo "Error: " . $stmt->error;
  }
  
  $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add a Client to CRM System</title>
</head>
<body>

<h2>Add New Client</h2>

<form method="post">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" required><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br>
  <label for="phone">Phone:</label><br>
  <input type="text" id="phone" name="phone"><br>
  <label for="address">Address:</label><br>
  <textarea id="address" name="address"></textarea><br><br>
  <input type="submit" value="Add Client">
</form>

</body>
</html>