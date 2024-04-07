<?php
// Single-file approach for an e-commerce account creation with an instant coupon reward.
// WARNING: This is a simplified example. In a real-world scenario, you should consider security practices.

// Database connection settings
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create users table if not exists
$usersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

$conn->query($usersTable);

// Create coupons table if not exists
$couponsTable = "CREATE TABLE IF NOT EXISTS coupons (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    coupon_code VARCHAR(15) NOT NULL,
    is_used BOOLEAN DEFAULT false,
    FOREIGN KEY (user_id) REFERENCES users(id)
    )";

$conn->query($couponsTable);

function generateCouponCode() {
    return 'WELCOME' . rand(1000, 9999);
}

$signupSuccess = false;
$couponCode = "";
$userEmail = "";

// Handle user registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get email and password from POST request
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Password hashing

    // Insert user into the database
    $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $password);
    if ($stmt->execute()) {
        $signupSuccess = true;
        $userEmail = $email;
        $userId = $conn->insert_id;
        $couponCode = generateCouponCode(); // Generate a unique coupon code

        // Insert coupon into the database
        $stmt = $conn->prepare("INSERT INTO coupons (user_id, coupon_code) VALUES (?, ?)");
        $stmt->bind_param("is", $userId, $couponCode);
        $stmt->execute();
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up - E-commerce Handbags Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <?php if ($signupSuccess): ?>
        <p>Thank you for signing up, <?= htmlspecialchars($userEmail) ?>.</p>
        <p>Your coupon code: <strong><?= $couponCode ?></strong></p>
    <?php else: ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Sign Up">
        </form>
    <?php endif; ?>
</div>
</body>
</html>
