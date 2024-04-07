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

$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // echo "Table users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS coupons (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
coupon_code VARCHAR(50) NOT NULL,
user_id INT(6) UNSIGNED,
FOREIGN KEY (user_id) REFERENCES users(id),
validity DATE NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  // echo "Table coupons created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
  $stmt->bind_param("ss", $email, $password);
  $stmt->execute();

  $last_id = $stmt->insert_id;
  $coupon_code = "WELCOME" . strval(rand(1000,9999));
  $validity = date('Y-m-d', strtotime('+30 days'));

  $stmt = $conn->prepare("INSERT INTO coupons (coupon_code, user_id, validity) VALUES (?, ?, ?)");
  $stmt->bind_param("sis", $coupon_code, $last_id, $validity);
  $stmt->execute();

  $message = "Account Created Successfully! Your Coupon Code: " . $coupon_code;
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
<title>Signup - Fitness Equipment</title>
<style>
body {font-family: Arial, sans-serif;}
.container {
  width: 50%;
  margin: auto;
  padding: 20px;
}
input[type=email], input[type=password], button {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
button {
  background-color: #4CAF50;
  color: white;
  border: none;
  cursor: pointer;
}
button:hover {
  opacity: 0.8;
}
</style>
</head>
<body>
<div class="container">
  <h2>Signup for Discount!</h2>
  <form method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <label for="psw">Password:</label>
    <input type="password" id="psw" name="password" required>
    <button type="submit">Signup</button>
  </form>
  <?php if(!empty($message)): ?>
    <p><?php echo $message; ?></p>
  <?php endif; ?>
</div>
</body>
</html>
