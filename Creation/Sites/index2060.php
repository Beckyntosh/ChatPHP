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
$table = "CREATE TABLE IF NOT EXISTS pet_profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pet_name VARCHAR(30) NOT NULL,
pet_type VARCHAR(30) NOT NULL,
health_info TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
  echo "Table pet_profiles created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle post request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pet_name = $_POST["pet_name"];
  $pet_type = $_POST["pet_type"];
  $health_info = $_POST["health_info"];

  $sql = "INSERT INTO pet_profiles (pet_name, pet_type, health_info)
  VALUES ('$pet_name', '$pet_type', '$health_info')";

  if ($conn->query($sql) === TRUE) {
    echo "New pet profile created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Pet Profile Creation</title>
<style>
body {
  font-family: 'Times New Roman', Times, serif;
  background-color: #f3e5ab;
}
form {
  background-color: white;
  padding: 20px;
  margin: 50px auto;
  width: 500px;
  border: 2px solid #a29415;
}
label, input {
  display: block;
  margin-bottom: 10px;
}
button {
  background-color: #a29415;
  color: white;
  padding: 10px;
  border: none;
  cursor: pointer;
}
button:hover {
  background-color: #b3a429;
}
</style>
</head>
<body>

<h2>Create Pet Profile</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="pet_name">Pet Name:</label>
  <input type="text" id="pet_name" name="pet_name" required>

  <label for="pet_type">Pet Type:</label>
  <input type="text" id="pet_type" name="pet_type" required>

  <label for="health_info">Health Info:</label>
  <textarea id="health_info" name="health_info" rows="4" required></textarea>

  <button type="submit">Submit</button>
</form>

</body>
</html>
