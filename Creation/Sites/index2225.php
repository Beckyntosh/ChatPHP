<?php
// This script handles both the display of the signup form and the processing of it.
// Connection parameters
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

// Function to create tables if they don't exist
function createTablesIfNeeded($conn) {
  $userTableSql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

  $couponTableSql = "CREATE TABLE IF NOT EXISTS coupons (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    code VARCHAR(10) NOT NULL,
    is_used BOOLEAN NOT NULL DEFAULT FALSE,
    FOREIGN KEY (user_id) REFERENCES users(id)
  )";

  if ($conn->query($userTableSql) !== TRUE || $conn->query($couponTableSql) !== TRUE) {
    die("Error creating table: " . $conn->error);
  }
}

// Call the function to ensure tables exist
createTablesIfNeeded($conn);

// Function to generate a random coupon code
function generateCouponCode() {
  $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $length = 10;
  $couponCode = '';
  for ($i = 0; $i < $length; $i++) {
    $couponCode .= $characters[mt_rand(0, strlen($characters) - 1)];
  }
  return $couponCode;
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  // Insert the new user into the users table
  $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
  
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $email, $password);
  $stmt->execute();

  // Retrieve the newly created user's ID
  $user_id = $stmt->insert_id;
  
  // Generate and assign a coupon to the new user
  $couponCode = generateCouponCode();
  $sql = "INSERT INTO coupons (user_id, code) VALUES (?, ?)";
  
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("is", $user_id, $couponCode);
  $stmt->execute();

  echo "<h2>Congratulations on signing up! Your coupon code is: $couponCode</h2>";
} else {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup Form</title>
</head>
<body>
<h2>Signup for Our Musical Instruments E-commerce Site</h2>
<form method="POST">
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" value="Signup">
</form>
</body>
</html>
<?php
}
// Close connection
$conn->close();
?>
