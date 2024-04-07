<?php
// Initialize connection variables
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

// Create users table if it does not exist
$usersTableSql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($usersTableSql) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

// Create coupons table if it does not exist
$couponsTableSql = "CREATE TABLE IF NOT EXISTS coupons (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
coupon_code VARCHAR(50) NOT NULL,
user_id INT(6) UNSIGNED,
FOREIGN KEY (user_id) REFERENCES users(id),
validity DATETIME
)";

if ($conn->query($couponsTableSql) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

// Function to generate random coupon code
function generateCouponCode($length = 10) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    // Gather form data
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Insert new user
    $sql = "INSERT INTO users (email, password) VALUES ('".$email."', '".md5($password)."')";
    
    if ($conn->query($sql) === TRUE) {
        // Generate a coupon for the new user
        $coupon_code = generateCouponCode();
        $user_id = $conn->insert_id;
        $validity = date('Y-m-d H:i:s', strtotime('+1 month'));
        
        $couponSql = "INSERT INTO coupons (coupon_code, user_id, validity) VALUES ('".$coupon_code."', '".$user_id."', '".$validity."')";
        
        if ($conn->query($couponSql) === TRUE) {
            echo "Account created successfully. Your coupon code is: " . $coupon_code;
        } else {
            echo "Error: " . $couponSql . "<br>" . $conn->error;
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
<title>Sign up & Get a Coupon!</title>
</head>
<body>
<h2>Sign Up for Our Office Supplies Website</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Email: <input type="text" name="email" required>
  Password: <input type="password" name="password" required>
  <input type="submit" value="Submit">
</form>
</body>
</html>
