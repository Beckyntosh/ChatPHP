<?php
// Database configuration
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

// Create table for security cameras if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS SecurityCameras (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
location VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table SecurityCameras created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert new camera if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $location = $_POST['location'];

    $sql = "INSERT INTO SecurityCameras (name, location)
    VALUES ('$name', '$location')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Security Camera</title>
</head>
<body>
<h2>Add Nest Cam Outdoor to Your System</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <label for="name">Camera Name:</label><br>
  <input type="text" id="name" name="name" value="Nest Cam Outdoor"><br>
  <label for="location">Location:</label><br>
  <input type="text" id="location" name="location" placeholder="Enter location"><br><br>
  <input type="submit" value="Add Camera">
</form> 

</body>
</html>
