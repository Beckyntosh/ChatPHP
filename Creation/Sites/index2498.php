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

// Create USERS table if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(60) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Signup Form Submit
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])){
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $email = $_POST['email'];
  
  // Insert User into Database
  $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
  
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $username, $password, $email);
  $stmt->execute();
  
  echo "<div>Registration Successful! Welcome to Premium File Storage.</div>";
}

// HTML Form
echo "
<!DOCTYPE html>
<html>
<head>
<title>Signup for Premium Storage - Sherlock Holmes Style</title>
<style>
  body { font-family: 'Courier New', monospace; background-color: #f0e68c; }
  form { margin: auto; width: 300px; padding: 10px; background-color: #ffffff; border: 2px solid #000; }
  input[type=text], input[type=password], input[type=email] { width: 94%; padding: 5px; margin: 5px 0; }
  input[type=submit] { background-color: #8b4513; color: white; padding: 10px 20px; border: none; cursor: pointer; }
  div { color: green; }
</style>
</head>
<body>

<form method="post">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" required><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" required><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br>
  <input type="submit" value="Register" name="register">
</form>

</body>
</html>
";

$conn->close();
?>
