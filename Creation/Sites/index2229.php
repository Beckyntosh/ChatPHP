<?php
// Create connection
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

// Attempt to create the user table and coupon table if they don't exist
$sqlUserTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$sqlCouponTable = "CREATE TABLE IF NOT EXISTS coupons (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
coupon_code VARCHAR(30) NOT NULL,
user_id INT(6) UNSIGNED,
FOREIGN KEY (user_id) REFERENCES users(id)
)";

$conn->query($sqlUserTable);
$conn->query($sqlCouponTable);

// Method to generate unique coupon code
function generateCouponCode() {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $couponCode = '';
    for ($i = 0; $i < 10; $i++) {
        $couponCode .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $couponCode;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? null;
    $email = $_POST['email'] ?? null;

    // Insert user
    $stmt = $conn->prepare("INSERT INTO users (username, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $userID = $stmt->insert_id;
    $stmt->close();
    
    // Generate and assign coupon
    $couponCode = generateCouponCode();
    $stmt = $conn->prepare("INSERT INTO coupons (coupon_code, user_id) VALUES (?, ?)");
    $stmt->bind_param("si", $couponCode, $userID);
    $stmt->execute();
    $stmt->close();
    
    echo "Congratulations, $username! You have signed up successfully. Use coupon code: $couponCode for a discount on your next purchase!";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup and get a Coupon</title>
</head>
<body>
    <h2>Signup</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
      Username: <input type="text" name="username" required><br>
      Email: <input type="email" name="email" required><br>
      <input type="submit" value="Signup">
    </form>
</body>
</html>
