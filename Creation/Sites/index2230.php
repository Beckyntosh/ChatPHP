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

// Create table for users if it doesn't exist
$userTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($userTable) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Create table for coupons if it doesn't exist
$couponTable = "CREATE TABLE IF NOT EXISTS coupons (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
coupon_code VARCHAR(50) NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id)
)";

if (!$conn->query($couponTable) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

function generateCouponCode() {
  $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $randstring = '';
  for ($i = 0; $i < 8; $i++) {
    $randstring .= $characters[rand(0, strlen($characters) - 1)];
  }
  return $randstring;
}

if ($_POST) {
  // Collect post data
  $email = $conn->real_escape_string($_POST['email']);
  $password = $conn->real_escape_string($_POST['password']);  // You should hash the password in a real application
  
  // Insert user into database
  $insertUserSql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
  
  if ($conn->query($insertUserSql) === TRUE) {
    $last_id = $conn->insert_id;
    $couponCode = generateCouponCode();
    $insertCouponSql = "INSERT INTO coupons (user_id, coupon_code) VALUES ('$last_id', '$couponCode')";
    
    if ($conn->query($insertCouponSql) === TRUE) {
      echo "Account successfully created and coupon code: $couponCode has been sent to your email!";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>

<h2>Signup for Exclusive Wines Deals</h2>

<form method="post">
  Email:<br>
  <input type="text" name="email">
  <br>
  Password:<br>
  <input type="password" name="password">
  <br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
