<?php
// Simple E-commerce Account Creation with Instant Coupon Reward Example

// Database settings
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

// Create user and coupon tables if not exists
$userTableSql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL UNIQUE,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$couponTableSql = "CREATE TABLE IF NOT EXISTS coupons (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    coupon_code VARCHAR(15) NOT NULL UNIQUE,
    user_id INT(6) UNSIGNED,
    discount INT(3) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

$conn->query($userTableSql);
$conn->query($couponTableSql);

function generateCouponCode() {
  $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $length = 10;
  $couponCode = '';
  for ($i = 0; $i < $length; $i++) {
    $couponCode .= $chars[mt_rand(0, strlen($chars) - 1)];
  }
  return $couponCode;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Insert user
    $stmt = $conn->prepare("INSERT INTO users (email) VALUES (?)");
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        // Get user ID
        $last_id = $stmt->insert_id;

        // Generate coupon code
        $couponCode = generateCouponCode();
        $discount = 10; // 10% discount for simplicity

        $couponStmt = $conn->prepare("INSERT INTO coupons (coupon_code, user_id, discount) VALUES (?, ?, ?)");
        $couponStmt->bind_param("sii", $couponCode, $last_id, $discount);

        if ($couponStmt->execute()) {
            echo "Welcome, $email! Your coupon code is $couponCode with a $discount% discount.";
        } else {
            echo "Failed to create a coupon.";
        }
    } else {
        echo "Failed to create user.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup & Get a Discount Coupon</title>
</head>
<body>

<h2>Signup for Our E-commerce Site</h2>

<form method="post" action="">
  Email:<br>
  <input type="text" name="email" required>
  <br><br>
  <input type="submit" value="Signup">
</form>

</body>
</html>
