<?php
// Database configuration
$host = "db";
$dbname = "my_database";
$username = "root";
$password = "root";

// Connect to Database
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = file_get_contents('init.sql');
    $conn->exec($sql);

    // Create coupons Table if it does not exist
    $sql = "CREATE TABLE IF NOT EXISTS coupons (
        id INT AUTO_INCREMENT PRIMARY KEY,
        code VARCHAR(255) NOT NULL,
        discount DECIMAL(5, 2) NOT NULL,
        validity DATE NOT NULL
    )";
    $conn->exec($sql);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

// Process the form submission
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
    // Validate input and insert to database
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $couponCode = 'NEW' . strtoupper(substr(md5(time()), 0, 6));
    $discount = 20.00; // 20% discount for demonstration
    $validity = date('Y-m-d', strtotime('+30 days')); // Valid for 30 days

    try {
        $sql = "INSERT INTO coupons (code, discount, validity) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$couponCode, $discount, $validity]);

        $message = "Thank you for signing up! Your coupon code is: $couponCode";
    } catch (PDOException $e) {
        $message = "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Maternity Wear - Coupon Signup</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            text-align: center;
            padding: 40px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
            margin-top: 20px;
        }
        h1 {
            color: #5c3d99;
        }
        .coupon-signup-form input[type="email"] {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #caced9;
            display: block;
            margin-right: auto;
            margin-left: auto;
        }
        .coupon-signup-form input[type="submit"] {
            background-color: #5c3d99;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Our Maternity Wear Shop</h1>
        <p>Sign up for a coupon on your first purchase!</p>
        <form action="" method="post" class="coupon-signup-form">
            <input type="email" name="email" placeholder="Enter your email" required>
            <input type="submit" value="Get Coupon">
        </form>
        
        <?php if ($message): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        
    </div>
</body>
</html>