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

// Create pet table if not exists
$sql = "CREATE TABLE IF NOT EXISTS pets (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Pets created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $petName = $_POST['petName'];
    $petType = $_POST['petType'];
    $healthInfo = $_POST['healthInfo'];

    $stmt = $conn->prepare("INSERT INTO pets (name, type, health_info) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $petName, $petType, $healthInfo);
    $stmt->execute();

    echo "New pet profile created successfully";
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Create Pet Profile</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Pet Name: <input type="text" name="petName">
  <br><br>
  Pet Type: <input type="text" name="petType">
  <br><br>
  Health Info:
  <textarea name="healthInfo" rows="5" cols="40"></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
