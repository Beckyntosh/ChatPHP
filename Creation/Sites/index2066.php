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

// SQL to create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS Pets (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
type VARCHAR(30) NOT NULL,
healthInfo TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $type = $_POST['type'];
  $healthInfo = $_POST['healthInfo'];

  $stmt = $conn->prepare("INSERT INTO Pets (name, type, healthInfo) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $type, $healthInfo);

  if ($stmt->execute()) {
    echo "New pet profile created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
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
<title>Create Pet Profile</title>
<style>
body { font-family: Arial, sans-serif; }
.container { max-width: 600px; margin: auto; padding: 20px; }
input[type=text], textarea { width: 100%; padding: 12px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; box-sizing: border-box; }
button { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%; }
</style>
</head>
<body>

<div class="container">
  <h2>Create a Pet Profile</h2>
  <form method="post" action="<?=$_SERVER['PHP_SELF'];?>">
    <label for="name">Pet Name:</label>
    <input type="text" id="name" name="name" required>
    
    <label for="type">Pet Type:</label>
    <input type="text" id="type" name="type" required>
    
    <label for="healthInfo">Health Information:</label>
    <textarea id="healthInfo" name="healthInfo" required></textarea>
    
    <button type="submit">Create Profile</button>
  </form>
</div>

</body>
</html>
