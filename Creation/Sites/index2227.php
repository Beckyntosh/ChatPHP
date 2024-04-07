<?php
// Handling form data and connecting to the database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";
$couponCode = "WELCOME10";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exist
$sqlUserTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

$sqlCouponTable = "CREATE TABLE IF NOT EXISTS coupons (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
code VARCHAR(50) NOT NULL,
discount INT(3) NOT NULL,
status VARCHAR(10) NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($sqlUserTable) === TRUE && $conn->query($sqlCouponTable) === TRUE) {
    // Tables created successfully or already exist
} else {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email')";

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
        // Create a coupon for the user
        $sqlCoupon = "INSERT INTO coupons (user_id, code, discount, status) VALUES ('$last_id', '$couponCode', 10, 'active')";
        if ($conn->query($sqlCoupon) === TRUE) {
            echo "<script>alert('Thank you for signing up! Your coupon code is: $couponCode');</script>";
        } else {
            echo "Error: " . $sqlCoupon . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up & Redeem your Coupon!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0ebe3;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type=text], input[type=email] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Signup & Get Instant Coupon</h2>
        <form method="POST">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" required>
            
            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <input type="submit" value="Sign Up">
        </form>
    </div>
</body>
</html>
