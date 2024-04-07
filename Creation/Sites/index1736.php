<?php
// Database connection
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

// Create tables if they don't exist
$sql = "CREATE TABLE IF NOT EXISTS pets (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
species VARCHAR(50),
age INT,
health_info TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table Pets created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form data submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $species = $_POST['species'];
    $age = $_POST['age'];
    $health_info = $_POST['health_info'];

    $stmt = $conn->prepare("INSERT INTO pets (name, species, age, health_info) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $name, $species, $age, $health_info);

    if ($stmt->execute() === TRUE) {
      echo "<p>Pet profile created successfully.</p>";
    } else {
      echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Pet Profile</title>
</head>
<body>
<h2>Create a Profile for Your Pet</h2>

<form action="" method="post">
    <label for="name">Pet Name:</label><br>
    <input type="text" id="name" name="name" required><br>
    <label for="species">Species:</label><br>
    <input type="text" id="species" name="species" required><br>
    <label for="age">Age:</label><br>
    <input type="number" id="age" name="age" required><br>
    <label for="health_info">Health Info:</label><br>
    <textarea id="health_info" name="health_info" rows="4" required></textarea><br>
    <input type="submit" value="Create Profile">
</form>

</body>
</html>
