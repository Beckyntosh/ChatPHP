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

// Create table query
$sql = "CREATE TABLE IF NOT EXISTS pets (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
type VARCHAR(30) NOT NULL,
breed VARCHAR(50),
age INT(3),
health_info VARCHAR(255),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Pets created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $type = $_POST['type'];
  $breed = $_POST['breed'];
  $age = $_POST['age'];
  $health_info = $_POST['health_info'];

  // Prepare statement
  $stmt = $conn->prepare("INSERT INTO pets (name, type, breed, age, health_info) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssds", $name, $type, $breed, $age, $health_info);

  // Execute statement
  if ($stmt->execute()) {
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

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="name" required>
  <br><br>
  Type (e.g., Dog, Cat): <input type="text" name="type" required>
  <br><br>
  Breed: <input type="text" name="breed">
  <br><br>
  Age: <input type="number" name="age">
  <br><br>
  Health Info: <textarea name="health_info" rows="5" cols="40"></textarea>
  <br><br>
  <input type="submit" name="submit" value="Create Profile">
</form>

</body>
</html>
