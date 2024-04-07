<?php
// Connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Attempt MySQL server connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS coupons (
    coupon_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    coupon_code VARCHAR(50) NOT NULL,
    user_id INT(6) UNSIGNED,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check for POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect POST data
    $username = $_POST['username'];
    $email = $_POST['email'];
    
    // Insert user into database
    $sql = "INSERT INTO users (username, email) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $email);
    if ($stmt->execute()) {
        // Generate and insert coupon for the user
        $last_id = $stmt->insert_id;
        $coupon_code = "WELCOME" . str_pad($last_id, 4, '0', STR_PAD_LEFT);
        $sql = "INSERT INTO coupons (coupon_code, user_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $coupon_code, $last_id);
        if ($stmt->execute()) {
            $coupon_message = "Congratulations! Your coupon code is: " . htmlspecialchars($coupon_code);
        } else {
            $coupon_message = "An error occurred while generating your coupon.";
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
    <title>Sign Up and Get a Coupon!</title>
</head>
<body>
    <h1>Welcome to our Video Games Website!</h1>
    <h2>Sign up now and get an instant coupon for your next purchase!</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Sign Up">
    </form>
    <?php
    if (!empty($coupon_message)) {
        echo "<p>$coupon_message</p>";
    }
    ?>
</body>
</html>