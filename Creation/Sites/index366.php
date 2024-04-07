<?php
// Connect to database
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

// Create users table if not exists
$usersSql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
reg_date TIMESTAMP,
coupon_code VARCHAR(50)
)";

if ($conn->query($usersSql) === TRUE) {
  // echo "Table Users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle user signup
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = md5($_POST['password']); // simple encryption for password
  $coupon_code = substr(md5(rand()), 0, 7); // generate a random coupon code

  $sql = "INSERT INTO users (username, password, coupon_code) VALUES ('$username', '$password', '$coupon_code')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully. Your coupon code is: " . $coupon_code;
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
  <h2>Sign Up for Our Sunglasses Website</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" value="Sign Up">
  </form>
</body>
</html>