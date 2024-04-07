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

// Create pets table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS pets (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(30) NOT NULL,
type VARCHAR(30) NOT NULL,
health_info VARCHAR(255),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert pet into table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $type = $_POST['type'];
  $health_info = $_POST['health_info'];

  $stmt = $conn->prepare("INSERT INTO pets (name, type, health_info) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $type, $health_info);
  
  if ($stmt->execute() === TRUE) {
    echo "New pet profile created successfully";
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
<title>Create Pet Profile</title>
</head>
<body>

<h2>Create Pet Profile</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="name" required>
  <br><br>
  Type: <input type="text" name="type" required>
  <br><br>
  Health Info: <textarea name="health_info" rows="5" cols="40" required></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>
