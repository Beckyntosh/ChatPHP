<?php
// Simple database connection script
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

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $petName = $_POST['petName'];
    $petType = $_POST['petType'];
    $healthInfo = $_POST['healthInfo'];
    
    $sql = "INSERT INTO pet_profiles (petName, petType, healthInfo) VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $petName, $petType, $healthInfo);
    
    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $stmt->close();
}

// Create table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
petName VARCHAR(30) NOT NULL,
petType VARCHAR(30) NOT NULL,
healthInfo TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($tableSql) === TRUE) {
    //echo "Table pet_profiles created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Create Pet Profile</title>
<style>
    body{font-family: Arial, sans-serif; background-color: #f0f0f0; margin: 0;}
    .container{max-width: 400px; padding: 20px; margin: 100px auto; background-color: white; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
    input[type=text], textarea{width: 100%; padding: 10px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;}
    input[type=submit]{width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;}
    input[type=submit]:hover{background-color: #45a049;}
</style>
</head>
<body>

<div class="container">
  <h2>Create Pet Profile</h2>
  <form action="" method="post">
    <label for="petName">Pet Name:</label>
    <input type="text" id="petName" name="petName" required>

    <label for="petType">Pet Type:</label>
    <input type="text" id="petType" name="petType" required>

    <label for="healthInfo">Health Info:</label>
    <textarea id="healthInfo" name="healthInfo" required></textarea>

    <input type="submit" value="Create Profile">
  </form>
</div>

</body>
</html>
