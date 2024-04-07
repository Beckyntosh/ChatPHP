<?php
session_start();

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
$sqlUsers = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
reg_date TIMESTAMP
)";

$sqlEvents = "CREATE TABLE IF NOT EXISTS events (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
event_name VARCHAR(50) NOT NULL,
event_date DATE,
FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($sqlUsers) === TRUE && $conn->query($sqlEvents) === TRUE) {
  // Tables created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Register user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
  $username = $conn->real_escape_string($_POST["username"]);
  $email = $conn->real_escape_string($_POST["email"]);
  $password = password_hash($conn->real_escape_string($_POST["password"]), PASSWORD_DEFAULT);

  $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register for Webinar</title>
</head>
<body>
    <h2>Event Registration</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
      <label for="username">Username:</label><br>
      <input type="text" id="username" name="username" required><br>

      <label for="email">Email:</label><br>
      <input type="email" id="email" name="email" required><br>

      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password" required><br>

      <input type="submit" name="register" value="Register">
    </form> 
</body>
</html>
