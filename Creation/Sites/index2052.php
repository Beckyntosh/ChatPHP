<?php
// Define database connection parameters
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
$sql = "CREATE TABLE IF NOT EXISTS PetProfiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
petName VARCHAR(30) NOT NULL,
petType VARCHAR(30) NOT NULL,
healthInfo TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table creation success
} else {
  echo "Error creating table: " . $conn->error;
}

// Check for POST data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $petName = $_POST['petName'];
  $petType = $_POST['petType'];
  $healthInfo = $_POST['healthInfo'];
  
  // SQL to insert new record
  $sql = "INSERT INTO PetProfiles (petName, petType, healthInfo)
  VALUES ('$petName', '$petType', '$healthInfo')";
  
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
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

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Pet Name: <input type="text" name="petName" required>
  <br><br>
  Pet Type: <input type="text" name="petType" required>
  <br><br>
  Health Info: <textarea name="healthInfo" rows="5" cols="40"></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>
