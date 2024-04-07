<?php
// Connect to MySQL database
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

// Create users table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle user signup
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  
  $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
  
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $name, $email);
    
  if ($stmt->execute()) {
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
<title>Signup Page</title>
</head>
<body>

<h2>Signup Form</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <label for="fname">Name:</label><br>
  <input type="text" id="fname" name="name" required><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
