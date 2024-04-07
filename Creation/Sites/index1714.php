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

// Create table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS pets (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
petName VARCHAR(30) NOT NULL,
petType VARCHAR(30) NOT NULL,
healthInfo TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($tableSql) === TRUE) {
  echo "Table Pets created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handling the post request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $petName = $_POST['petName'];
    $petType = $_POST['petType'];
    $healthInfo = $_POST['healthInfo'];

    $stmt = $conn->prepare("INSERT INTO pets (petName, petType, healthInfo) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $petName, $petType, $healthInfo);

    if ($stmt->execute() === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Pet Profile</title>
</head>
<body>

<h2>Create Pet Profile</h2>

<form method="POST">
  <label for="petName">Pet Name:</label><br>
  <input type="text" id="petName" name="petName" required><br>
  <label for="petType">Pet Type:</label><br>
  <input type="text" id="petType" name="petType" required><br>
  <label for="healthInfo">Health Info:</label><br>
  <textarea id="healthInfo" name="healthInfo" rows="4" cols="50" required></textarea><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
