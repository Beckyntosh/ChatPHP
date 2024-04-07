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

// Create table if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS pet_profiles (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  pet_name VARCHAR(30) NOT NULL,
  age INT(3),
  type VARCHAR(30),
  breed VARCHAR(50),
  health_info TEXT,
  dietary_info TEXT,
  reg_date TIMESTAMP
)";

if ($conn->query($table_sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pet_name = $_POST['pet_name'];
  $age = $_POST['age'];
  $type = $_POST['type'];
  $breed = $_POST['breed'];
  $health_info = $_POST['health_info'];
  $dietary_info = $_POST['dietary_info'];

  $sql = "INSERT INTO pet_profiles (pet_name, age, type, breed, health_info, dietary_info)
  VALUES ('$pet_name', '$age', '$type', '$breed', '$health_info', '$dietary_info')";

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
        Pet Name: <input type="text" name="pet_name" required><br><br>
        Age: <input type="number" name="age" required><br><br>
        Type: <input type="text" name="type" required><br><br>
        Breed: <input type="text" name="breed" required><br><br>
        Health Information: <textarea name="health_info" required></textarea><br><br>
        Dietary Information: <textarea name="dietary_info" required></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>