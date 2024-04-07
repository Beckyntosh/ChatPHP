<?php
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

// Create tables if not exists
$sql_users = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
loyalty_member BOOLEAN NOT NULL DEFAULT FALSE
)";

$sql_loyalty_program = "CREATE TABLE IF NOT EXISTS loyalty_program (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
points INT(10) NOT NULL DEFAULT 0,
FOREIGN KEY (user_id) REFERENCES users(id)
)";


if ($conn->query($sql_users) === TRUE && $conn->query($sql_loyalty_program) === TRUE) {
  // Tables created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect form data
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $loyalty_member = isset($_POST['loyalty_member']) ? 1 : 0;

  // Insert user data
  $stmt = $conn->prepare("INSERT INTO users (username, password, email, loyalty_member) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("sssi", $username, $password, $email, $loyalty_member);
  $stmt->execute();

  $last_user_id = $stmt->insert_id;

  // If opted for loyalty program, add to loyalty program table
  if ($loyalty_member) {
    $stmt = $conn->prepare("INSERT INTO loyalty_program (user_id, points) VALUES (?, ?)");
    $points = 100; // Default signup points
    $stmt->bind_param("ii", $last_user_id, $points);
    $stmt->execute();
  }

  echo "<p>Thank you for registering!</p>";

  $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Hair Care Products - Sign up</title>
<style>
body { font-family: Arial, sans-serif; }
</style>
</head>
<body>

<h2>Welcome to Our Hair Care Products Website!</h2>
<p>Sign up and join our loyalty program to enjoy exclusive benefits.</p>

<form method="post" action="">
  Username: <input type="text" name="username" required><br><br>
  Password: <input type="password" name="password" required><br><br>
  Email: <input type="email" name="email" required><br><br>
  <input type="checkbox" name="loyalty_member" value="1"> Join the Loyalty Program<br><br>
  <input type="submit" value="Sign Up">
</form>

</body>
</html>