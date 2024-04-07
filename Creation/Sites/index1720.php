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
$table_sql = "CREATE TABLE IF NOT EXISTS pets (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
species VARCHAR(30) NOT NULL,
breed VARCHAR(50),
age INT(3),
health_info TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
  //echo "Table Pets created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $species = $_POST['species'];
  $breed = $_POST['breed'];
  $age = $_POST['age'];
  $health_info = $_POST['health_info'];

  $sql = "INSERT INTO pets (name, species, breed, age, health_info)
  VALUES ('$name', '$species', '$breed', '$age', '$health_info')";

  if ($conn->query($sql) === TRUE) {
    echo "<div>Pet profile has been created successfully</div>";
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
<style>
body {font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f0f0f0;}
.container {max-width: 600px; margin: 20px auto; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);}
form {display: flex; flex-wrap: wrap;}
input[type="text"], input[type="number"], textarea {width: 100%; padding: 10px; margin: 5px 0; box-sizing: border-box;}
input[type="submit"] {background-color: #4CAF50; color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer;}
input[type="submit"]:hover {background-color: #45a049;}
div {margin-top: 10px;}
</style>
</head>
<body>

<div class="container">
  <h2>Create Pet Profile</h2>
  <form action="" method="post">
    <label for="name">Pet Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="species">Species:</label>
    <input type="text" id="species" name="species" required>

    <label for="breed">Breed:</label>
    <input type="text" id="breed" name="breed">

    <label for="age">Age:</label>
    <input type="number" id="age" name="age">

    <label for="health_info">Health Information:</label>
    <textarea id="health_info" name="health_info" rows="4" required></textarea>

    <input type="submit" value="Create Profile">
  </form>
</div>

</body>
</html>
