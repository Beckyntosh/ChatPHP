<?php

// Connect to Database
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

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
  reg_date TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
  echo "Table pet_profiles created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle Post Request to create pet profile
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_name = $_POST['pet_name'];
    $pet_type = $_POST['pet_type'];
    $health_info = $_POST['health_info'];
    
    $sql = "INSERT INTO pet_profiles (pet_name, pet_type, health_info) VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $pet_name, $pet_type, $health_info);
    
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
    <h2>Create a Pet Profile</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="pet_name">Pet Name:</label><br>
        <input type="text" id="pet_name" name="pet_name" required><br><br>
        
        <label for="pet_type">Pet Type:</label><br>
        <input type="text" id="pet_type" name="pet_type" required><br><br>
        
        <label for="health_info">Health Info:</label><br>
        <textarea id="health_info" name="health_info" rows="4" cols="50"></textarea><br><br>
        
        <input type="submit" value="Create Profile">
    </form>
</body>
</html>
