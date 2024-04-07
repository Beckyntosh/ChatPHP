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

// Create user table if not exists
$userTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
coupon_code VARCHAR(10),
reg_date TIMESTAMP
)";

if ($conn->query($userTable) === TRUE) {
    echo "";
} else {
    echo "Error creating table: " . $conn->error;
}

function generateCouponCode() {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $couponCode = '';
    for ($i = 0; $i < 10; $i++) {
        $couponCode .= $characters[mt_rand(0, strlen($characters) - 1)];
    }
    return $couponCode;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    $couponCode = generateCouponCode();
    
    $sql = "INSERT INTO users (name, email, coupon_code) VALUES ('$name', '$email', '$couponCode')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully. Your coupon code is: $couponCode";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup with Instant Coupon Reward</title>
    <style>
        body {font-family: Arial, sans-serif;}
        .container {max-width: 600px; margin: 20px auto; padding: 20px;}
        input, button {margin-top: 10px;}
    </style>
</head>
<body>

<div class="container">
    <h2>Signup for Our Baby Products and Get an Instant Coupon!</h2>
    <form method="POST" action="">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>
