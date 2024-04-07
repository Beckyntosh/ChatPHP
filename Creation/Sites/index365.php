<?php
// Create connection
$conn = new mysqli('db', 'root', 'root', 'my_database');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$createUsersTable = "CREATE TABLE IF NOT EXISTS users (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    email VARCHAR(30) NOT NULL,
                    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                    )";

$createCouponsTable = "CREATE TABLE IF NOT EXISTS coupons (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    code VARCHAR(30) NOT NULL,
                    discount DECIMAL(10,2) NOT NULL,
                    user_id INT(6) UNSIGNED,
                    FOREIGN KEY (user_id) REFERENCES users(id)
                    )";

if (!$conn->query($createUsersTable) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

if (!$conn->query($createCouponsTable) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Function to generate unique coupon code
function generateCouponCode($conn) {
    $couponCode = substr(md5(uniqid(rand(), true)), 0, 10); // Generate unique code
    // Check if code already exists
    $checkQuery = "SELECT id FROM coupons WHERE code = '$couponCode'";
    $result = $conn->query($checkQuery);
    if ($result->num_rows > 0) {
        return generateCouponCode($conn); // Recursively generate code if exists
    } else {
        return $couponCode;
    }
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];
    // Insert user into database
    $insertUserQuery = "INSERT INTO users (email) VALUES ('$email')";
    if ($conn->query($insertUserQuery) === TRUE) {
        $last_id = $conn->insert_id;
        $couponCode = generateCouponCode($conn);
        // Generate a 10% discount coupon for the user
        $insertCouponQuery = "INSERT INTO coupons (code, discount, user_id) VALUES ('$couponCode', 10.00, '$last_id')";
        if ($conn->query($insertCouponQuery) === TRUE) {
            echo "Congrats! Your account has been created and you've received a discount coupon: " . $couponCode;
        } else {
            echo "Error: " . $insertCouponQuery . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $insertUserQuery . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup and Receive Coupon</title>
</head>
<body>
    <h2>Signup for Our Wines Website</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <input type="submit" value="Signup">
    </form>
</body>
</html>