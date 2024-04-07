// PARAMETERS: Function: E-commerce Account Creation with Instant Coupon Reward: create an example signup process with a coupon reward. Example: New user signs up for an e-commerce site and receives a discount coupon Product: Watches Style: minimalist
<?php
// Assuming you've already configured your MySQL Database
$MYSQL_HOST = 'db';
$MYSQL_USER = 'root';
$MYSQL_PASS = 'root';
$MYSQL_DB = 'my_database';

$conn = new mysqli($MYSQL_HOST, $MYSQL_USER, $MYSQL_PASS, $MYSQL_DB);

// Create Users table if not exists
$conn->query("CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
)");

// Create Coupons table if not exists
$conn->query("CREATE TABLE IF NOT EXISTS coupons (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    code VARCHAR(10),
    discount INT(3),
    FOREIGN KEY (user_id) REFERENCES users(id)
)");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    // Insert User
    $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $firstname, $lastname, $email);
    $stmt->execute();

    $userId = $stmt->insert_id;

    // Generate Coupon Code
    $couponCode = 'WELCOME' . rand(100, 999);
    $couponDiscount = 10; // e.g., 10%

    // Insert Coupon
    $stmt = $conn->prepare("INSERT INTO coupons (user_id, code, discount) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $userId, $couponCode, $couponDiscount);
    $stmt->execute();

    echo "Account created successfully! Your coupon code is " . $couponCode;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; }
        .form-group input[type="text"],
        .form-group input[type="email"] { width: 100%; padding: 8px; }
        button { padding: 10px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <h2>Sign Up and Get a Coupon!</h2>
    <form method="POST">
        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" required>
        </div>
        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <button type="submit">Sign Up</button>
    </form>
</body>
</html>
