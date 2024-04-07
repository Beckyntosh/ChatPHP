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
$sql = "CREATE TABLE IF NOT EXISTS pets (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
health_info VARCHAR(255),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table creation success
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $health_info = $_POST['health_info'];

    $sql = "INSERT INTO pets (name, health_info) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $health_info);

    if ($stmt->execute()) {
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
  <label for="name">Pet Name:</label><br>
  <input type="text" id="name" name="name" required><br>
  <label for="health_info">Health Info:</label><br>
  <input type="text" id="health_info" name="health_info" required><br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
