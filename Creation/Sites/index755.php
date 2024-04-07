<?php

// Database connection settings
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to MySQL Database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Attempt to create tables if they do not exist
$sqlProductsTable = "CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  description TEXT,
  category VARCHAR(100),
  price DECIMAL(10, 2),
  stock_quantity INT
);";

$sqlUsersTable = "CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30),
  name VARCHAR(30),
  email VARCHAR(50),
  password VARCHAR(255)
);";

$conn->query($sqlProductsTable);
$conn->query($sqlUsersTable);

// HTML Header and Styles
echo "<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>Handbags Event Planning and Management Site</title>
  <style>
    body { font-family: Arial, sans-serif; background-color: #f4f4f4; }
    .container { max-width: 600px; margin: auto; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
    h2 { text-align: center; color: #333; }
    .login { margin-top: 20px; }
    input[type=text], input[type=password] { width: 100%; padding: 15px; margin: 5px 0 22px 0; border: none; background: #f1f1f1; }
    .btn { background-color: #555; color: white; padding: 16px 20px; border: none; cursor: pointer; width: 100%; opacity: 0.9; }
    .btn:hover { opacity: 1; }
  </style>
</head>
<body>
<div class='container'>
  <h2>Login to Your Account</h2>
  <form action='' method='post'>
    <div class='login'>
      <label for='username'><b>Username</b></label>
      <input type='text' placeholder='Enter Username' name='username' required>
      <label for='password'><b>Password</b></label>
      <input type='password' placeholder='Enter Password' name='password' required>
      <button type='submit' class='btn'>Login</button>
    </div>
  </form>
</div>
</body>
</html>";

// Check for POST request to login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $conn->real_escape_string($_POST['username']);
  $password = $_POST['password']; // In a real application, password should be hashed

  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // In a real application, set session variables, or token, and redirect to another page
    echo "<script>alert('Login successful');</script>";
  } else {
    echo "<script>alert('Login failed');</script>";
  }
}

$conn->close();
?>