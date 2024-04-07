<?php
// Connecting to the database
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
$sql = "CREATE TABLE IF NOT EXISTS pets (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table pets created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handling form data and inserting into database
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $type = $_POST['type'];
  $health_info = $_POST['health_info'];

  $sql = "INSERT INTO pets (name, type, health_info) VALUES ('$name', '$type', '$health_info')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Create Pet Profile</title>
</head>
<body>

<h2>Create Pet Profile</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="name">Pet Name:</label><br>
  <input type="text" id="name" name="name" required><br>
  <label for="type">Pet Type:</label><br>
  <input type="text" id="type" name="type" required><br>
  <label for="health_info">Health Info:</label><br>
  <textarea id="health_info" name="health_info" rows="4" cols="50" required></textarea><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>

<?php
$conn->close();
?>
