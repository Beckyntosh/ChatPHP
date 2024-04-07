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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  fullname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  password VARCHAR(50),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql = "INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)";
  
  $stmt = $conn->prepare($sql); 
  if($stmt === false) {
      die("Error in query");
  }

  $stmt->bind_param("sss", $fullname, $email, $password);

  if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $stmt->error;
  }
  $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Sign Up for Premium File Storage</title>
<style>
body, html {
  font-family: Arial, sans-serif;
  background: #f0f0f0;
  margin: 0;
  padding: 0;
}
.container {
  max-width: 400px;
  margin: 20px auto;
  padding: 20px;
  background: white;
  border-radius: 5px;
}
h2 {
  text-align: center;
  color: #333;
}
input[type=text], input[type=password], input[type=email] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
input[type=text]:focus, input[type=password]:focus, input[type=email]:focus {
  background-color: #ddd;
  outline: none;
}
.btn {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}
.btn:hover {
  opacity: 1;
}
</style>
</head>
<body>

<form action="" method="post" class="container">
  <h2>Signup for Premium Storage</h2>
  <label for="fullname"><b>Full Name</b></label>
  <input type="text" placeholder="Enter Full Name" name="fullname" required>

  <label for="email"><b>Email</b></label>
  <input type="email" placeholder="Enter Email" name="email" required>

  <label for="psw"><b>Password</b></label>
  <input type="password" placeholder="Enter Password" name="password" required>

  <button type="submit" class="btn">Sign Up</button>
</form>

</body>
</html>
