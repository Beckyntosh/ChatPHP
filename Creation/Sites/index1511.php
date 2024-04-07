<?php
// Variables for database connection
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

// Attempt to create table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS clients (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  contact_email VARCHAR(50),
  contact_phone VARCHAR(15),
  registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!$conn->query($tableSql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle POST request to add a new client
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $clientName = $_POST['name'];
  $clientEmail = $_POST['email'];
  $clientPhone = $_POST['phone'];

  $insertSql = "INSERT INTO clients (name, contact_email, contact_phone)
  VALUES (?, ?, ?)";

  $stmt = $conn->prepare($insertSql);
  $stmt->bind_param("sss", $clientName, $clientEmail, $clientPhone);

  if ($stmt->execute() === TRUE) {
    echo "<p>New client added successfully</p>";
  } else {
    echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
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
    <title>Add a Client</title>
</head>
<body>
    <h1>Add a New Client</h1>
    <form action="" method="post">
        <label for="name">Client Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Contact Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <label for="phone">Contact Phone:</label><br>
        <input type="text" id="phone" name="phone"><br><br>
        <input type="submit" value="Add Client">
    </form>
</body>
</html>
