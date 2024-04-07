<?php
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

// Create tables if they do not exist
$sqlUserTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
loyalty_member BOOLEAN NOT NULL DEFAULT FALSE
)";

$sqlLoyaltyTable = "CREATE TABLE IF NOT EXISTS loyalty_program (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
points INT(10),
FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($sqlUserTable) === TRUE && $conn->query($sqlLoyaltyTable) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $loyalty = isset($_POST['loyalty']) ? 1 : 0;

  $sql = "INSERT INTO users (username, password, email, loyalty_member) VALUES (?, ?, ?, ?)";
  
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssi", $username, $password, $email, $loyalty);
  
  if ($stmt->execute()) {
    $last_id = $stmt->insert_id;
    if ($loyalty == 1) {
      $sqlLoyalty = "INSERT INTO loyalty_program (user_id, points) VALUES (?, 0)";
      $stmtLoyalty = $conn->prepare($sqlLoyalty);
      $stmtLoyalty->bind_param("i", $last_id);
      $stmtLoyalty->execute();
    }
    echo "New record created successfully. Welcome to our loyalty program!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $stmt->close();
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sign Up</title>
<style>
body { font-family: Arial, sans-serif; }
</style>
</head>
<body>

<h2>Signup Form</h2>

<form method="post">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" required><br>
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" required><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email"><br>
  <input type="checkbox" id="loyalty" name="loyalty" value="1">
  <label for="loyalty">Join our loyalty program</label><br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>