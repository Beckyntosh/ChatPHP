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

// sql to create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS members (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table Members created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = md5($_POST['password']); // Password encryption with MD5
  
  // Check if user already exists
  $checkExists = "SELECT * FROM members WHERE email='$email'";
  $result = $conn->query($checkExists);
  
  if ($result->num_rows > 0) {
    echo "User already exists.";
  } else {
    $sql = "INSERT INTO members (username, email, password) VALUES ('$username', '$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
      // Redirect to login page or member area
      header("Location: member_area.php");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
<title>Signup for Exclusive Content</title>
</head>
<body>
<h2>Signup for Access to Exclusive Members-Only Content</h2>
<form method="post" action="">
  Username: <input type="text" name="username" required><br><br>
  Email: <input type="email" name="email" required><br><br>
  Password: <input type="password" name="password" required><br><br>
  <input type="submit" value="Submit">
</form>
</body>
</html>
