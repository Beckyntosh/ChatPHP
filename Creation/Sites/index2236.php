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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
coupon_code VARCHAR(50) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  // echo "Table Users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = $_POST['firstname'];
  $email = $_POST['email'];
  
  // Generate a random coupon code
  $coupon_code = 'COUPON' . rand(1000, 9999);

  $sql = "INSERT INTO users (firstname, email, coupon_code) VALUES ('$firstname', '$email', '$coupon_code')";

  if ($conn->query($sql) === TRUE) {
    $message = "Account Created Successfully. Your Coupon Code: $coupon_code";
  } else {
    $message = "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up</title>
<style>
  body { font-family: Arial, sans-serif; }
  .container { max-width: 400px; margin: auto; padding: 20px; }
  input[type="text"], input[type="email"] { width: 100%; padding: 10px; margin: 10px 0; }
  input[type="submit"] { width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
  input[type="submit"]:hover { background-color: #45a049; }
  .message { background-color: #f1f1f1; padding: 10px; color: green; margin: 10px 0; }
</style>
</head>
<body>

<div class="container">
  <h2>Signup Form</h2>
  <?php if ($message): ?>
    <div class="message"><?php echo $message; ?></div>
  <?php endif; ?>

  <form method="post" action="">
    <input type="text" name="firstname" placeholder="First Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="submit" value="Sign Up">
  </form>
</div>

</body>
</html>
