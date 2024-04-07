<?php
// DB configuration
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
$sql = "CREATE TABLE IF NOT EXISTS PetProfiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
petName VARCHAR(30) NOT NULL,
petType VARCHAR(30) NOT NULL,
healthInfo TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $petName = $_POST['petName'];
    $petType = $_POST['petType'];
    $healthInfo = $_POST['healthInfo'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO PetProfiles (petName, petType, healthInfo) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $petName, $petType, $healthInfo);

    // Execute
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
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
    <form method="POST" action="">
        Pet Name: <input type="text" name="petName" required><br>
        Pet Type: <input type="text" name="petType" required><br>
        Health Info: <textarea name="healthInfo" required></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
