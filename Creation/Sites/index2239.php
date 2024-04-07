<?php

// Database Connection
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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  
  // Generate a unique coupon code
  $couponCode = "WELCOME" . substr(md5(time()), 0, 6);
  
  // Insert user and coupon into database
  $sqlUser = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
  $sqlCoupon = "INSERT INTO coupons (email, coupon_code) VALUES ('$email', '$couponCode')";

  if ($conn->query($sqlUser) === TRUE && $conn->query($sqlCoupon) === TRUE) {
    echo "Account created successfully! Your welcome coupon is: " . $couponCode;
  } else {
    echo "Error: " . $sqlUser . "<br>" . $conn->error;
  }
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Sign Up for Vinyl Records</title>
  <style>
    body { font-family: Arial, sans-serif; }
    .container { max-width: 600px; margin: auto; padding: 20px; }
    input[type="email"], input[type="password"] { width: 100%; padding: 10px; margin: 10px 0; }
    input[type="submit"] { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%; }
    input[type="submit"]:hover { background-color: #45a049; }
  </style>
</head>
<body>

<div class="container">
  <h2>Create Account on Vinyl Records</h2>
  
  <form action="" method="post">
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>
    <input type="submit" value="Sign Up">
  </form>
</div>

</body>
</html>
