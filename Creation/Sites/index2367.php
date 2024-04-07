<?php
// Assuming your file is named index.php and serves as both the frontend form and the script processing the form.

// Database connection variables
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
$usersTableSql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP
)";

if ($conn->query($usersTableSql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handling the form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = md5($_POST['password']); // md5 for simplicity, consider using password_hash() in a real project

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
    <title>Gardening Tools Forum Signup</title>
</head>
<body>
    <h2>Signup Form</h2>
    <form method="post" action="">
        Username:<br>
        <input type="text" name="username" required><br>
        Email:<br>
        <input type="email" name="email" required><br>
        Password:<br>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
